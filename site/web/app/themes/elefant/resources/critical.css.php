.preload {
   background: rgba(220, 239, 244, 0.5);
   width: 100%;
   display: block;
   z-index: 9998;
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

.pre-header {
   border-radius: 8px;
   padding: 0 15px;
   margin: 30px auto;
   max-width: 1140px;
}

.pre-container-inner {
   display: block;
}

.pre-header-inner {
   background: rgb(255, 255, 255);
   width: 100%;
   height: 80px;
   border-radius: 8px;
}

.pre-wrap {
   border-radius: 8px;
   padding: 0 15px;
   margin: 30px auto;
   max-width: 1140px;
}

.pre-box1 {
   background: rgb(255, 255, 255);
   padding: 0px;
   border-radius: 8px;
   height: 400px;
   width: 65.7%;
   float: left;
   height: 500px;
}

.pre-box2 {
   background: rgb(255, 255, 255);
   padding: 15px;
   height: 400px;
   border-radius: 8px;
   width: 31.6%;
   float: right;
   height: 500px; 
}

/* Medium devices (tablets, less than 992px) */
@media (max-width: 991.98px) {
.pre-header {
   margin: 15px auto;
}
.pre-header-inner {
   height: 60px;
}
.pre-wrap {
   float: left;
   width: 100%;
   margin: 5px auto 0 auto;
}
.pre-box1 {
   width: 100%;
   margin-bottom: 26px;
   height: 500px;
}
.pre-box2 {
   width: 100%;
   height: 500px;
}

}

/* Small devices (landscape phones, less than 768px) */
@media (max-width: 767.98px) {
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
