
<section class="top-banner">
  <!--<div class="bg"><img src="@asset('images/bg-3.svg')" /></div>-->
  <div class="container-fluid">

      <div class="d-flex flex-row row">
          <div class="col-sm-8 flex-fill my-flex-item">
            <div class="content-box">
              <h2 class="title">News / Blog</h2>
                <div class="multiple-items-top">
                    @if ($Posts->have_posts())
                    @while ($Posts->have_posts()) @php $Posts->the_post() @endphp
                      @include('partials.slidercontent-'.get_post_type())
                    @endwhile
                    @endif
                  </div>
            </div>
          </div>

          <div class="col-sm-4 flex-fill my-flex-item">
            <div class="content-box">
              <h2 class="title">Hilfe</h2>
              Sie möchten persönlich unterstützt werden? Lassen Sie sich per Telefon, Chat oder E-Mail unterstützen
                  <a class="contact" href="/hilfe">
                  <button class="btn btn-primary text-white email"><i class="fas fa-envelope"></i>Support Ticket erstellen</button>
                  </a>
                  oder direkt 
                  <a class="contact" href="mailto:nd@intermac.de">
                    <button class="btn btn-primary text-white email"><i class="fas fa-envelope"></i>hilfe@intermac.de</button>
                  </a>
                  <a class="contact" href="tel:015127555942">
                    <button class="btn btn-primary text-white tel"><i class="fas fa-phone"></i>0151 27 555 942</button>
                  </a>
            </div>
          </div>
     </div>

  </div>
</section>
