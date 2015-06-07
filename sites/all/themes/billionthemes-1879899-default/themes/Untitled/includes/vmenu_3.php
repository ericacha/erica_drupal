<?php function Untitled_vmenu_3() { 
?>
   <div class=" bd-vmenu-3">
    <div class=" bd-block">
        <div class=" bd-container-1">
            <h4>VMenu Block</h4>
        </div>
        
        <div class=" bd-container-2 shape-only">
            <div class=" bd-verticalmenu">
                <div class="bd-container-inner">
                    
                    <ul class=" bd-menu-45 nav nav-pills navbar-left">
                        
                        <li class=" bd-menuitem-40">
                            <a href="#">Item 1</a>
                            <div class="bd-menu-43-popup">
                                
                                <ul class=" bd-menu-43">
                                    
                                    <li class=" bd-menuitem-41">
                                        <a class="" href="#">SubItem 1</a>
                                    </li>
                                    

                                    
                                    <li class=" bd-menuitem-41">
                                        <a class="" href="#">SubItem 2</a>
                                    </li>
                                    
                                </ul>
                                
                            </div>
                        </li>
                        

                        
                        <li class=" bd-menuitem-40">
                            <a href="#">Item 2</a>
                        </li>
                        

                        
                        <li class=" bd-menuitem-40">
                            <a href="#">Item 3</a>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
        </div>
        
    </div>
    
    <script>
        initResponsiveMenu(
            '.bd-vmenu-3', {
                responsiveLevels: '',
                subMenuSelector: '.bd-menu-43',
                menuItemSelector: '.bd-menuitem-40',
                subMenuItemSelector: '.bd-menuitem-41'
            }
        );
    </script>
</div><?php }