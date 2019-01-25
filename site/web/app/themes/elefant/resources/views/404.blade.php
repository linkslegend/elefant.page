@extends('layouts.app')

@section('content')
  <div class="container">
  @if (!have_posts())
    <div class="row align-items-center">
        <div class="col-xl-6 col-lg-5 col-md-6 col-sm-12">
          <div class="alert alertcontent">
            Oh nein ... Die angeforderte Seite oder Dokument ist entweder nicht mehr verfügbar, oder Sie sind einem ungültigen Link gefolgt.<br />
            Bitte entschuldigen Sie die entstandenen Unannehmlichkeiten.<br />
            <ul>
            <br />
              Versuchen Sie folgendes:
              <li><a href="elefant.page">Gehen Sie zur Startseite</a></li>
              <li><a href="/kontakt">Gehen Sie zur Kontaktseite</a></li>
            </ul>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="alertimage">
            <img src="https://d1zczzapudl1mr.cloudfront.net/blank-kraken.gif" data-src="@asset('images/404-page-1.svg')" class="lozad 404image" />
          </div>
        </div>
    </div>
      <!--{!! get_search_form(false) !!}-->
  @endif
</div>


@endsection
