@extends('layout')
@section('title', 'comunidades')
@section('content')
<style>
  /* CSS COMUNIDADES */
  article {
      --img-scale: 1.001;
      --title-color: black;
      --link-icon-translate: -20px;
      --link-icon-opacity: 0;
      position: relative;
      border-radius: 16px;
      box-shadow: none;
      background: #fff;
      transform-origin: center;
      transition: all 0.4s ease-in-out;
      overflow: hidden;
  }

  article a::after {
      position: absolute;
      inset-block: 0;
      inset-inline: 0;
      cursor: pointer;
      content: "";
  }

  /* basic article elements styling */
  article h2 {
      margin: 0 0 18px 0;
      font-family: "Bebas Neue", cursive;
      font-size: 1.9rem;
      letter-spacing: 0.06em;
      color: var(--title-color);
      transition: color 0.3s ease-out;
  }

  figure {
      margin: 0;
      padding: 0;
      aspect-ratio: 16 / 9;
      overflow: hidden;
  }

  article img {
      max-width: 100%;
      transform-origin: center;
      transform: scale(var(--img-scale));
      transition: transform 0.4s ease-in-out;
  }

  .article-body {
      padding: 24px;
  }

  article a {
      display: inline-flex;
      align-items: center;
      text-decoration: none;
      color: #28666e;
  }

  article a:focus {
      outline: 1px dotted #28666e;
  }

  article a .icon {
      min-width: 24px;
      width: 24px;
      height: 24px;
      margin-left: 5px;
      transform: translateX(var(--link-icon-translate));
      opacity: var(--link-icon-opacity);
      transition: all 0.3s;
  }

  /* using the has() relational pseudo selector to update our custom properties */
  article:has(:hover, :focus) {
      --img-scale: 1.1;
      --title-color: #28666e;
      --link-icon-translate: 0;
      --link-icon-opacity: 1;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
  }


  /************************
Generic layout (demo looks)
**************************/

  /* *,
  *::before,
  *::after {
      box-sizing: border-box;
  } */
/*
  body {
      margin: 0;
      padding: 48px 0;
      font-family: "Figtree", sans-serif;
      font-size: 1.2rem;
      line-height: 1.6rem;
      background-image: linear-gradient(45deg, #7c9885, #b5b682);
      min-height: 100vh;
  } */

  .articles {
      display: grid;
      max-width: 1200px;
      margin-inline: auto;
      padding-inline: 24px;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 24px;
  }

  @media screen and (max-width: 960px) {
      article {
          container: card/inline-size;
      }

      .article-body p {
          display: none;
      }
  }

  @container card (min-width: 380px) {
      .article-wrapper {
          display: grid;
          grid-template-columns: 100px 1fr;
          gap: 16px;
      }

      .article-body {
          padding-left: 0;
      }

      figure {
          width: 100%;
          height: 100%;
          overflow: hidden;
      }

      figure img {
          height: 100%;
          aspect-ratio: 1;
          object-fit: cover;
      }
  }

  .sr-only:not(:focus):not(:active) {
      clip: rect(0 0 0 0);
      clip-path: inset(50%);
      height: 1px;
      overflow: hidden;
      position: absolute;
      white-space: nowrap;
      width: 1px;
  }
</style>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ secure_asset('/storage/bg_comunidade.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Comunidades <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Comunidades</h1>
                    <a href="#comunidades"> <i class="fa fa-angle-double-down fa-lg" style="color: white"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5 articles">
      @foreach ($comunidades as $comunidade)
        <article>
            <div class="article-wrapper">
                <figure>
                    <img src="{{ secure_asset('/storage/' . $comunidade->imagem_principal) }}" alt="" />
                </figure>
                <div class="article-body">
                    <h2>{{ $comunidade->nome }}</h2>
                    <p>
                        {{ $comunidade->titulo }}
                    </p>
                    <a href="/comunidade-{{ $comunidade->id }}" class="read-more">
                        Ler Mais <span class="sr-only">about this is some title</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </article>
      @endforeach
    </section>

    <script>
        $(document).ready(function() {
            // Rolar a tela para baixo até 500 pixels ao carregar a página
            $('html, body').animate({
                scrollTop: 615
            }, 2000); // 1000 é a duração da animação em milissegundos
        });
    </script>

@endsection
