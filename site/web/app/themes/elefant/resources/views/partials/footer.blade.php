<footer class="content-info d-flex align-items-end">
    <div class="container-fluid">
      <div class="content-box">
    @php dynamic_sidebar('sidebar-footer') @endphp
    <section class="bottom">
    <div class="d-flex align-items-center justify-content-center">

          <div class="develop text-mini justify-content-start">
            Made with <i class="fas fa-heart"></i> Powerd by <a href="https://wordpress.org/">Wordpress</a> & <a href="https://roots.io/">Roots</a>
          </div>
          <ul class="socials list-unstyled d-md-inline-flex justify-content-end flex-fill align-items-center">
          <li><a href="https://www.linkedin.com/company/intermac"><i class="fab fa-linkedin"></i><span>LinkedIn</span></a></li>
          <li><a href="https://www.facebook.com/intermac/"><i class="fab fa-facebook-square"></i><span>Facebook</span></a></li>
          <li><a href="https://twitter.com/intermac"><i class="fab fa-twitter-square"></i><span>Twitter</span></a></li>
          </ul>

    </div>
    </section>
    <div class="copyright">© <?php echo date("Y"); ?> Intermac  |  <a href="/impressum">Impressum</a>  |  <a href="/agb">AGB</a>  |  <a href="/cookies">Cookies</a>  |  <a href="/datenschutzerklaerung">Datenschutzerklaerung</a></div>

  </div>
</div>
</footer>

<script>
  var div = document.createElement('div'); div.className = 'fb-customerchat'; div.setAttribute('page_id', '156509297740628'); div.setAttribute('ref', ''); document.body.appendChild(div);  window.fbMessengerPlugins = window.fbMessengerPlugins || {    init: function () {      FB.init({        appId            : '1678638095724206',        autoLogAppEvents : true,        xfbml            : true,        version          : 'v3.3'      });    }, callable: []  };  window.fbAsyncInit = window.fbAsyncInit || function () {    window.fbMessengerPlugins.callable.forEach(function (item) { item(); });    window.fbMessengerPlugins.init();  };  setTimeout(function () {    (function (d, s, id) {      var js, fjs = d.getElementsByTagName(s)[0];      if (d.getElementById(id)) { return; }      js = d.createElement(s);      js.id = id;      js.src = "//connect.facebook.net/en_US/sdk/xfbml.customerchat.js"; fjs.parentNode.insertBefore(js, fjs);    }(document, 'script', 'facebook-jssdk'));  }, 0);
</script>