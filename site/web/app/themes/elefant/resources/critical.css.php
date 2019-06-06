.preload {
   background: rgba(255, 255, 255, 0.85);
   width: 100%;
   display: block;
   z-index: 9999;
   height: 100%;
   position: fixed;
   opacity: 1;
   transition: all 0.15s;
}

.preloader {
   display: block;
   width: 100%;
   z-index: 9999;
   position: fixed;
   height: 100%;
   text-align: center;
   margin: 0 auto;
}

.preloader:before {
   content: "" !important;
   -webkit-box-sizing: border-box !important;
   box-sizing: border-box !important;
   position: absolute !important;
   top: 50%;
   width: 43px !important;
   height: 43px !important;
   z-index: 9999;
   margin-top: -12px !important;
   margin-left: -12px !important;
   border-radius: 50% !important;
   border: 7px solid #fff !important;
   border-top-color: #f66900 !important;
   -webkit-animation: spinner 0.6s linear infinite !important;
   -o-animation: spinner 0.6s linear infinite !important;
   animation: spinner 0.6s linear infinite !important;
}

.hidden {
   visibility: hidden;
   opacity: 0;
}

body {
   background-color: #dceff4;
}

.container-fluid {
   padding: 0 15px;
}

#header.banner>nav>div>div.inner-header.bg-white {
   background: white;
   border-radius: 8px;
   padding: 0;
   height: 60px;
}

.modal {
   display: none;
}

body > div.wrap > div > main > section.top-banner > div > div > div.col-lg-8.col-sm-12.flex-fill.my-flex-item {
   padding: 15px;
}

body > div.wrap > div > main > section.top-banner > div > div > div.col-lg-8.col-sm-12.flex-fill.my-flex-item > div.content-box {
   background: #fff;
   padding: 15px;
   border-radius: 8px;
   width: 100%;
   height: 503px;
}

body > div.wrap > div > main > section.top-banner > div > div > div.col-lg-8.col-sm-12.flex-fill.my-flex-item > div > div:empty {
   background: black;
}

header, nav {
   display: block
}
