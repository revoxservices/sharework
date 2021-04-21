<!DOCTYPE html>
<html>

<head>
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="../../images/favicon.png">
    <title>Share Work</title>
    <link rel="stylesheet" href="{{ asset('/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/theme.css') }}">

</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
       <div class="nk-main ">
          <div class="nk-wrap nk-wrap-nosidebar">
             <div class="nk-content ">
                
                    @yield('content')

             </div>
          </div>
       </div>
    </div>
    <ul class="nk-sticky-toolbar">
       <li class="demo-layout"><a class="toggle tipinfo" data-target="demoML" href="#" title="Main Demo Preview"><em class="icon ni ni-dashlite"></em></a></li>
       <li class="demo-thumb"><a class="toggle tipinfo" data-target="demoUC" href="#" title="Use Case Concept"><em class="icon ni ni-menu-squared"></em></a></li>
       <li class="demo-settings"><a class="toggle tipinfo" data-target="settingPanel" href="#" title="Demo Settings"><em class="icon ni ni-setting-alt"></em></a></li>
       <li class="demo-purchase"><a class="tipinfo" target="_blank" href="../../../item/dashlite-bootstrap-responsive-admin-dashboard-template/25780042.html" title="Purchase"><em class="icon ni ni-cart"></em></a></li>
    </ul>
    <div class="nk-demo-panel toggle-slide toggle-slide-right" data-content="demoML" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="any">
       <div class="nk-demo-head">
          <h6 class="mb-0">Switch Demo Layout</h6>
          <a class="nk-demo-close toggle btn btn-icon btn-trigger revarse mr-n2" data-target="demoML" href="#"><em class="icon ni ni-cross"></em></a>
       </div>
       <div class="nk-demo-list" data-simplebar="">
          <div class="nk-demo-item">
             <a href="../../../demo1/index.html">
                <div class="nk-demo-image bg-blue"><img class="bg-purple" src="../../../images/landing/layout-1d.jpg" srcset="../../../images/landing/layout-1d2x.jpg 2x" alt="Demo Layout 1"></div>
                <span class="nk-demo-title"><strong>Demo Layout 1</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo2/index.html">
                <div class="nk-demo-image bg-purple"><img src="../../../images/landing/layout-2d.jpg" srcset="../../../images/landing/layout-2d2x.jpg 2x" alt="Demo Layout 2"></div>
                <span class="nk-demo-title"><strong>Demo Layout 2</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo3/index.html">
                <div class="nk-demo-image bg-success"><img src="../../../images/landing/layout-3d.jpg" srcset="../../../images/landing/layout-3d2x.jpg 2x" alt="Demo Layout 3"></div>
                <span class="nk-demo-title"><strong>Demo Layout 3</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../index.html">
                <div class="nk-demo-image bg-indigo"><img src="../../../images/landing/layout-4d.jpg" srcset="../../../images/landing/layout-4d2x.jpg 2x" alt="Demo Layout 4"></div>
                <span class="nk-demo-title"><strong>Demo Layout 4</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo5/index.html">
                <div class="nk-demo-image bg-orange"><img src="../../../images/landing/layout-5d.jpg" srcset="../../../images/landing/layout-5d2x.jpg 2x" alt="Demo Layout 5"></div>
                <span class="nk-demo-title"><strong>Demo Layout 5</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo6/index.html">
                <div class="nk-demo-image bg-purple"><img src="../../../images/landing/layout-6d.jpg" srcset="../../../images/landing/layout-6d2x.jpg 2x" alt="Demo Layout 6"></div>
                <span class="nk-demo-title"><strong>Demo Layout 6</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo7/index.html">
                <div class="nk-demo-image bg-teal"><img src="../../../images/landing/layout-7d.jpg" srcset="../../../images/landing/layout-7d2x.jpg 2x" alt="Demo Layout 7"></div>
                <span class="nk-demo-title"><strong>Demo Layout 7</strong></span>
             </a>
          </div>
       </div>
    </div>
    <div class="nk-demo-panel toggle-slide toggle-slide-right" data-content="demoUC" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="any">
       <div class="nk-demo-head">
          <h6 class="mb-0">Use Case Concept</h6>
          <a class="nk-demo-close toggle btn btn-icon btn-trigger revarse mr-n2" data-target="demoUC" href="#"><em class="icon ni ni-cross"></em></a>
       </div>
       <div class="nk-demo-list" data-simplebar="">
          <div class="nk-demo-item">
             <a href="../../../demo2/ecommerce/index.html">
                <div class="nk-demo-image bg-dark"><img src="../../../images/landing/demo-ecommerce.jpg" srcset="../../../images/landing/demo-ecommerce2x.jpg 2x" alt="Ecommerce"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo2</em><br><strong>E-Commerce Panel</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo3/apps/file-manager.html">
                <div class="nk-demo-image bg-purple"><img src="../../../images/landing/demo-file-manager.jpg" srcset="../../../images/landing/demo-file-manager2x.jpg 2x" alt="File Manager"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo3</em><br><strong>Apps - File Manager</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../subscription/index.html">
                <div class="nk-demo-image bg-primary"><img src="../../../images/landing/demo-subscription.jpg" srcset="../../../images/landing/demo-subscription2x.jpg 2x" alt="SAAS / Subscription"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo4</em><br><strong>SAAS / Subscription Panel</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo5/crypto/index.html">
                <div class="nk-demo-image bg-warning"><img src="../../../images/landing/demo-buysell.jpg" srcset="../../../images/landing/demo-buysell2x.jpg 2x" alt="Crypto BuySell / Wallet"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo5</em><br><strong>Crypto BuySell Panel</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo6/invest/index.html">
                <div class="nk-demo-image bg-indigo"><img src="../../../images/landing/demo-invest.jpg" srcset="../../../images/landing/demo-invest2x.jpg 2x" alt="HYIP / Investment"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo6</em><br><strong>HYIP / Investment Panel</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../covid/index.html">
                <div class="nk-demo-image bg-danger"><img src="../../../images/landing/demo-covid19.jpg" srcset="../../../images/landing/demo-covid192x.jpg 2x" alt="Covid Situation"></div>
                <span class="nk-demo-title"><em class="text-primary">Covid</em><br><strong>Coronavirus Situation</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo3/apps/messages.html">
                <div class="nk-demo-image bg-success"><img src="../../../images/landing/demo-messages.jpg" srcset="../../../images/landing/demo-messages2x.jpg 2x" alt="Messages"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo3</em><br><strong>Apps - Messages</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo3/apps/mailbox.html">
                <div class="nk-demo-image bg-purple"><img src="../../../images/landing/demo-inbox.jpg" srcset="../../../images/landing/demo-inbox2x.jpg 2x" alt="Inbox"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo3</em><br><strong>Apps - Mailbox</strong></span>
             </a>
          </div>
          <div class="nk-demo-item">
             <a href="../../../demo3/apps/chats.html">
                <div class="nk-demo-image bg-purple"><img src="../../../images/landing/demo-chats.jpg" srcset="../../../images/landing/demo-chats2x.jpg 2x" alt="Chats / Messenger"></div>
                <span class="nk-demo-title"><em class="text-primary">Demo3</em><br><strong>Apps - Chats</strong></span>
             </a>
          </div>
       </div>
    </div>
    <div class="nk-demo-panel toggle-slide toggle-slide-right" data-content="settingPanel" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="any">
       <div class="nk-demo-head">
          <h6 class="mb-0">Preview Settings</h6>
          <a class="nk-demo-close toggle btn btn-icon btn-trigger revarse mr-n2" data-target="settingPanel" href="#"><em class="icon ni ni-cross"></em></a>
       </div>
       <div class="nk-opt-panel" data-simplebar="">
          <div class="nk-opt-set">
             <div class="nk-opt-set-title">Direction Change</div>
             <div class="nk-opt-list col-2x">
                <div class="nk-opt-item only-text active" data-key="dir" data-update="ltr"><span class="nk-opt-item-bg"><span class="nk-opt-item-name">LTR Mode</span></span></div>
                <div class="nk-opt-item only-text" data-key="dir" data-update="rtl"><span class="nk-opt-item-bg"><span class="nk-opt-item-name">RTL Mode</span></span></div>
             </div>
          </div>
          <div class="nk-opt-set">
             <div class="nk-opt-set-title">Main UI Style</div>
             <div class="nk-opt-list col-2x">
                <div class="nk-opt-item only-text active" data-key="style" data-update="ui-default"><span class="nk-opt-item-bg"><span class="nk-opt-item-name">Default</span></span></div>
                <div class="nk-opt-item only-text" data-key="style" data-update="ui-softy"><span class="nk-opt-item-bg"><span class="nk-opt-item-name">Softy</span></span></div>
             </div>
          </div>
          <div class="nk-opt-set nk-opt-set-header">
             <div class="nk-opt-set-title">Header Style</div>
             <div class="nk-opt-list col-4x">
                <div class="nk-opt-item active" data-key="header" data-update="is-light"><span class="nk-opt-item-bg is-light"><span class="bg-lighter"></span></span><span class="nk-opt-item-name">White</span></div>
                <div class="nk-opt-item" data-key="header" data-update="is-default"><span class="nk-opt-item-bg is-light"><span class="bg-light"></span></span><span class="nk-opt-item-name">Light</span></div>
                <div class="nk-opt-item" data-key="header" data-update="is-dark"><span class="nk-opt-item-bg"><span class="bg-dark"></span></span><span class="nk-opt-item-name">Dark</span></div>
                <div class="nk-opt-item" data-key="header" data-update="is-theme"><span class="nk-opt-item-bg"><span class="bg-theme"></span></span><span class="nk-opt-item-name">Theme</span></div>
             </div>
             <div class="nk-opt-set-title">Header Option</div>
             <div class="nk-opt-list col-2x">
                <div class="nk-opt-item only-text active" data-key="header_opt" data-update="is-regular"><span class="nk-opt-item-bg"><span class="nk-opt-item-name">Regular</span></span></div>
                <div class="nk-opt-item only-text" data-key="header_opt" data-update="nk-header-fixed"><span class="nk-opt-item-bg"><span class="nk-opt-item-name">Fixed</span></span></div>
             </div>
          </div>
          <div class="nk-opt-set nk-opt-set-skin">
             <div class="nk-opt-set-title">Primary Skin</div>
             <div class="nk-opt-list">
                <div class="nk-opt-item active" data-key="skin" data-update="default"><span class="nk-opt-item-bg"><span class="skin-default"></span></span><span class="nk-opt-item-name">Default</span></div>
                <div class="nk-opt-item" data-key="skin" data-update="blue"><span class="nk-opt-item-bg"><span class="skin-blue"></span></span><span class="nk-opt-item-name">Blue</span></div>
                <div class="nk-opt-item" data-key="skin" data-update="egyptian"><span class="nk-opt-item-bg"><span class="skin-egyptian"></span></span><span class="nk-opt-item-name">Egyptian</span></div>
                <div class="nk-opt-item" data-key="skin" data-update="purple"><span class="nk-opt-item-bg"><span class="skin-purple"></span></span><span class="nk-opt-item-name">Purple</span></div>
                <div class="nk-opt-item" data-key="skin" data-update="green"><span class="nk-opt-item-bg"><span class="skin-green"></span></span><span class="nk-opt-item-name">Green</span></div>
                <div class="nk-opt-item" data-key="skin" data-update="red"><span class="nk-opt-item-bg"><span class="skin-red"></span></span><span class="nk-opt-item-name">Red</span></div>
             </div>
          </div>
          <div class="nk-opt-set">
             <div class="nk-opt-set-title">Skin Mode</div>
             <div class="nk-opt-list col-2x">
                <div class="nk-opt-item active" data-key="mode" data-update="light-mode"><span class="nk-opt-item-bg is-light"><span class="theme-light"></span></span><span class="nk-opt-item-name">Light Skin</span></div>
                <div class="nk-opt-item" data-key="mode" data-update="dark-mode"><span class="nk-opt-item-bg"><span class="theme-dark"></span></span><span class="nk-opt-item-name">Dark Skin</span></div>
             </div>
          </div>
          <div class="nk-opt-reset"><a href="#" class="reset-opt-setting">Reset Setting</a></div>
       </div>
    </div>
    <script src="../../assets/js/bundle.js?ver=2.3.0"></script><script src="../../assets/js/scripts.js?ver=2.3.0"></script><script src="../../assets/js/demo-settings.js?ver=2.3.0"></script>
 

    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

</body>

</body>
</html>