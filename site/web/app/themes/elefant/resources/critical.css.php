.preload {
   background: rgba(220, 239, 244, 1);
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
   margin: 0 auto;
   max-width: 1140px;
}

.pre-product-wrap {
   margin-top: 100px;
   display: block;
   float: right;
   width: 75%;
}

.pre-box-filter,
.pre-product1,.pre-product2,
.pre-product3,.pre-product4,
.pre-product5,.pre-product6,
.pre-product7,
.pre-box3,
.pre-box2,
.pre-box1 {
   background: rgb(255, 255, 255);
   padding: 0px;
   border-radius: 8px;
   height: 400px;
   width: 65.7%;
   float: left;
   height: 500px;
}

.pre-product1,.pre-product2,
.pre-product3,.pre-product4,
.pre-product5,.pre-product6 {
   width: 30.7%;
   margin: 0 3.8% 3.1em 0;
   height: auto;
   padding: 15px;
}

.pre-product3,
.pre-product6 {
   margin: 0;
}

.pre-box2 {
   padding: 15px;
   height: 500px;
   width: 31.6%;
   float: right;
}

.pre-box3 {
   width: 100%;
   height: 500px;
   margin-top: 45px;
}

.pre-box-filter {
   padding: 15px;
   height: 700px;
   width: 22.68%;
   float: left;
   margin-right: 20px;
   margin-top: 15px;
}

.image-placeholder {
   display: block;
   width: 100%;
   margin-bottom: 10px;
   height: auto;
   border: 1px solid #dadada;
}
.heading-placeholder {
   height: 45px;
   width: 100%;
   background: #f2f2f2;
   padding: 0 15px;
   display: block;
   margin-bottom: 5px;
   content: "";
}
.price-placeholder {
   height: 30px;
   width: 100%;
   padding: 0 15px;
   background: #f2f2f2;
   display: block;
   content: "";
}
body.single .pre-box1 {
   background: rgb(255, 255, 255);
   padding: 0px;
   border-radius: 8px;
   height: 400px;
   width: 40%;
   float: left;
   height: 640px;}

body.single .pre-box3 {
   width: 57%;
   height: 800px;
   margin-top: 0;
   float: right;
}

/* Medium devices (tablets, less than 992px) */
@media (max-width: 991.98px) {
.pre-header {
   margin: 15px auto;}
.pre-header-inner {
   height: 60px;}
.pre-wrap {
   float: left;
   width: 100%;
   margin: 5px auto 0 auto;}
.pre-box1 {
   width: 100%;
   margin-bottom: 26px;
   height: 500px;}
.pre-box2 {
   width: 100%;
   height: 500px;}
.pre-box3 {
   width: 100%;
   height: 500px;}
.pre-product-wrap {
   margin-top: 55px;
   width: 100%;}
.pre-product1, .pre-product2, .pre-product3, 
.pre-product4, .pre-product5, .pre-product6 {
   width: 30.7%;
   margin: 0 3.8% 2em 0;
   height: auto;}
.pre-product3,
.pre-product6 {
   margin: 0;}
.pre-box-filter {
   height: 45px;
   width: 100%;
   float: left;
   margin-right: 20px;
   margin-top: 55px;}
}

/* Small devices (landscape phones, less than 768px) */
@media (max-width: 767.98px) {
.pre-product-wrap {
   margin-top: 55px;
   width: 100%;}
.pre-product1, .pre-product2, .pre-product3, 
.pre-product4, .pre-product5, .pre-product6 {
   width: 47.79%;
   margin: 0 4.35% 1em 0;
   height: auto;}
.pre-product2,
.pre-product4,
.pre-product6 {
   margin: 0;}
.pre-box-filter {
   height: 45px;
   width: 100%;
   float: left;
   margin-right: 20px;
   margin-top: 25px;}
}

@media (max-width: 575.98px) {
body.single .pre-box1 {
   background: rgb(255, 255, 255);
   padding: 0px;
   border-radius: 8px;
   height: 400px;
   width: 100%;
   float: left;
   height: 700px;
}
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
