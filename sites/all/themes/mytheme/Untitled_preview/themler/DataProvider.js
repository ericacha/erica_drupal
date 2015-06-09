/*global $, DataProviderHelper, SessionTimeoutError, ServerPermissionError, ErrorUtility */

var DataProvider = {};
(function () {
    'use strict';
    var context = window.parent;

    function validateResponse(xhr) {
        var error = DataProviderHelper.validateRequest(xhr);
        if (!error) {
            var responseText = xhr.responseText;
            if (typeof responseText === 'string') {
                if (responseText.indexOf('id="user-login-form"') !== -1 ||
                    responseText.indexOf('id="user-login"') !== -1) {
                    error = new SessionTimeoutError();
                    error.loginUrl = context.location.href;
                } else {
                    try {
                        var obj = JSON.parse(responseText);
                        if (obj.result === 'fail' && obj.type === 'permission') {
                            error = new ServerPermissionError(obj.error);
                        }
                    } catch (e) {
                    }
                }
            }
        }
        return error;
    }

    function ajaxFailHandler(url, xhr, status, callback) {
        var error = validateResponse(xhr);
        if (!error) {
            error = ErrorUtility.createRequestError(url, xhr, status, 'Request fail');
        }
        callback(error);
    }

    DataProvider.backToAdmin = function backToAdmin() {
        window.location = window.pluginData.url.admin;
    };

    DataProvider.getMaxRequestSize = function getMaxRequestSize() {
        return window.pluginData.maxRequestSize;
    };

    DataProvider.getAllCssJsSources = function getAllCssJsSources() {
        return window.pluginData.cssJsSources;
    };

    DataProvider.getMd5Hashes = function getMd5Hashes() {
        return window.pluginData.md5Hashes;
    };

    DataProvider.getTheme = function getTheme(options, callback) {
        $.ajax({
            url: window.pluginData.url.download,
            type: 'post',
            dataType: 'text',
            data: ({
                uid: window.pluginData.uid,
                themeName: window.pluginData.themeName,
                userThemeName: options.themeName,
                includeEditor: options.includeEditor
            })
        }).done(function getThemeSuccess(response, status, xhr) {
            var error = validateResponse(xhr);
            if (!error) {
                callback(null, response);
            } else {
                callback(error);
            }
        }).fail(function getThemeFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.download, xhr, status, callback);
        });
    };

    DataProvider.doExport = function doExport(exportData, callback) {
        var request = {
            'save': {
                'post': {
                    data: JSON.stringify(exportData),
                    uid: window.pluginData.uid,
                    themeName: window.pluginData.themeName
                },
                'url': window.pluginData.url.export
            },
            'clear': {
                'post': {
                    action : 'clear',
                    uid: window.pluginData.uid
                },
                'url': window.pluginData.url.clear
            },
            'errorHandler': validateResponse,
            'encode': true,
            'blob': true
        };
        DataProviderHelper.chunkedRequest(request, callback);
    };

    DataProvider.save = function (saveData, callback) {
        var request = {
            'save': {
                'post': {
                    data: JSON.stringify(saveData),
                    uid: window.pluginData.uid,
                    themeName: window.pluginData.themeName,
                    isNew: window.pluginData.isNew
                },
                'url': window.pluginData.url.save
            },
            'clear': {
                'post': {
                    action : 'clear',
                    uid: window.pluginData.uid
                },
                'url': window.pluginData.url.clear
            },
            'errorHandler': validateResponse,
            'encode': true,
            'blob': true
        };
        DataProviderHelper.chunkedRequest(request, callback);
    };

    DataProvider.load = function() {
        return window.pluginData.project.projectData;
    };

    DataProvider.updatePreviewTheme = function (callback) {
        $.ajax({
            url: window.pluginData.url.update,
            type: 'post',
            dataType: 'json',
            data: {
                uid: window.pluginData.uid,
                themeName: window.pluginData.themeName
            }
        })
        .done(function updatePreviewSuccess(response, status, xhr) {
            var error = validateResponse(xhr);
            callback(error, {logs: response.log || []});
        })
        .fail(function updatePreviewFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.update, xhr, status, callback);
        });
    };

    DataProvider.makeThemeAsActive = function (callback) {
        $.ajax({
            type: 'post',
            url: window.pluginData.url.publish,
            data: {
                uid: window.pluginData.uid,
                themeName: window.pluginData.themeName
            }
        }).done(function themeActiveSuccess(response, status, xhr) {
            var error = validateResponse(xhr);
            if (!error) {
                window.pluginData.isActive = true;
            }
            callback(error);
        }).fail(function themeActiveFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.publish, xhr, status, callback);
        });
    };

    DataProvider.rename = function rename(themeName, callback) {
        $.ajax({
            url: window.pluginData.url.rename,
            type: 'post',
            data: ({
                uid: window.pluginData.uid,
                newThemeName: themeName,
                themeName: window.pluginData.themeName
            })
        }).done(function renameSuccess(response, status, xhr) {
            var error = validateResponse(xhr);
            if (!error) {
                callback(null, context.location.href.replace(new RegExp('theme=' + window.pluginData.themeName), 'theme=' + themeName));
            } else {
                callback(error);
            }
        }).fail(function renameFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.rename, xhr, status, callback);
        });
    };

    DataProvider.canRename = function canRename(themeName, callback) {
        if (!callback || typeof callback !== 'function') {
            throw DataProviderHelper.getResultError('Invalid callback');
        }

        $.ajax({
            url: window.pluginData.url.canRename,
            type: 'post',
            data: ({
                uid: window.pluginData.uid,
                newThemeName: themeName,
                themeName: window.pluginData.themeName
            })
        }).done(function canRenameSuccess(response, status, xhr) {
            var error = validateResponse(xhr);
            if (!error) {
                if (response.result) {
                    callback(null, true);
                } else if (!response.result && response.error) {
                    callback(null, false, response.error);
                }
            } else {
                callback(error);
            }
        }).fail(function canRenameFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.canRename, xhr, status, callback);
        });
    };
    
    DataProvider.getFiles = function getFiles(mask, filter, callback) {
        $.ajax({
            type: 'post',
            url: window.pluginData.url.getFiles,
            dataType: 'json',
            data: {
                uid: window.pluginData.uid,
                mask: mask || '*',
                filter: filter || '',
                themeName: window.pluginData.themeName
            }
        }).done(function getFilesSuccess(response, status, xhr) {
            var error = validateResponse(xhr);
            if (!error) {
                callback(null, response.files);
            } else {
                callback(error);
            }
        }).fail(function getFilesFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.getFiles, xhr, status, callback);
        });
    };

    DataProvider.setFiles = function setFiles(files, callback) {
        if (!callback || typeof callback !== 'function') {
            throw DataProviderHelper.getResultError('Invalid callback');
        }

        var request = {
            'save': {
                'post': {
                    data: JSON.stringify(files),
                    uid: window.pluginData.uid,
                    themeName: window.pluginData.themeName
                },
                'url': window.pluginData.url.setFiles
            },
            'clear': {
                'post': {
                    action : 'clear',
                    uid: window.pluginData.uid
                },
                'url': window.pluginData.url.clear
            },
            'errorHandler': validateResponse,
            'encode': true,
            'blob': true
        };

        DataProviderHelper.chunkedRequest(request, callback);
    };

    DataProvider.themeNameValidation = function validation(name, callback) {
        $.ajax({
            url: window.pluginData.url.validation,
            type: 'post',
            data: ({
                uid: window.pluginData.uid,
                newThemeName: name
            })
        }).done(function themeNameValidationSuccess(response, status, xhr) {
            var error = validateResponse(xhr);
            if (!error) {
                if('true' === response) {
                    callback(null);
                } else {
                    callback(null, response);
                }
            } else {
                callback(error);
            }
        }).fail(function themeNameValidationFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.validation, xhr, status, callback);
        });
    };

    DataProvider.reloadTemplatesInfo = function reloadTemplatesInfo(callback) {
        if (!callback || typeof callback !== 'function') {
            throw DataProviderHelper.getResultError('Invalid callback');
        }

        $.ajax({
            url: window.pluginData.url.refreshTemplates,
            type: 'post',
            data: ({
                uid: window.pluginData.uid,
                themeName: window.pluginData.themeName                
            })
        }).done(function reloadTemplatesInfoSuccess(data, status, xhr) {
            var error = validateResponse(xhr);
            if (!error) {
                try {
                    $.each(data, function(key, value) {
                        window.pluginData.templates[key] = value;
                    });
                } catch(e) {
                    error = new Error(e);
                    error.args = { parseArgument: data };
                }
            } 
            callback(error);
        }).fail(function reloadTemplatesInfoFail(xhr, status) {
            ajaxFailHandler(window.pluginData.url.refreshTemplates, xhr, status, callback);
        });
    };

    DataProvider.getInfo = function getInfo(){
        var infoData = {};
        infoData.cmsName    = 'Drupal';
        infoData.cmsVersion = window.pluginData.cmsVersion;
        infoData.adminPage  = window.pluginData.url.admin;
        infoData.startPage  = window.pluginData.url.preview;
        infoData.uploadImage= window.pluginData.url.uploadImage;
        infoData.templates  = window.pluginData.templates;
        infoData.thumbnails = [{name: 'screenshot.png', width: 300, height: 220, version: '7.x'},{name: 'screenshot.png', width: 150, height: 90, version: '6.x'}];
        infoData.isThemeActive = window.pluginData.isActive;
        infoData.themeName = window.pluginData.themeName;

        return infoData;
    };

    DataProvider.getVersion = function () {
        return "0.0.2";
    };

}());