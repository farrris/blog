@extends('layouts.base')

@section("title", "добавление поста")

@section("content")   

   <main class="page__main page__main--adding-post">
      <div class="page__main-section">
        <div class="container">
          <h1 class="page__title page__title--adding-post">Добавить публикацию</h1>
        </div>
        <div class="adding-post container">
          <div class="adding-post__tabs-wrapper tabs">
            <div class="adding-post__tabs filters">
              <ul class="adding-post__tabs-list filters__list tabs__list">
                <li class="adding-post__tabs-item filters__item">
                  <a class="adding-post__tabs-link filters__button filters__button--photo filters__button--active tabs__item tabs__item--active button" onclick="clickByTabLink(this)" data-id="0">
                    <svg class="filters__icon" width="22" height="18">
                      <use xlink:href="#icon-filter-photo"></use>
                    </svg>
                    <span>Фото</span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item">
                  <a class="adding-post__tabs-link filters__button filters__button--video tabs__item button" href="#" onclick="clickByTabLink(this)" data-id="1">
                    <svg class="filters__icon" width="24" height="16">
                      <use xlink:href="#icon-filter-video"></use>
                    </svg>
                    <span>Видео</span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item" data-id="2">
                  <a class="adding-post__tabs-link filters__button filters__button--text tabs__item button" href="#" onclick="clickByTabLink(this)" data-id="2">
                    <svg class="filters__icon" width="20" height="21">
                      <use xlink:href="#icon-filter-text"></use>
                    </svg>
                    <span>Текст</span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item" data-id="3">
                  <a class="adding-post__tabs-link filters__button filters__button--quote tabs__item button" href="#" onclick="clickByTabLink(this)" data-id="3">
                    <svg class="filters__icon" width="21" height="20">
                      <use xlink:href="#icon-filter-quote"></use>
                    </svg>
                    <span>Цитата</span>
                  </a>
                </li>
                <li class="adding-post__tabs-item filters__item" data-id="4">
                  <a class="adding-post__tabs-link filters__button filters__button--link tabs__item button" href="#" onclick="clickByTabLink(this)" data-id="4">
                    <svg class="filters__icon" width="21" height="18">
                      <use xlink:href="#icon-filter-link"></use>
                    </svg>
                    <span>Ссылка</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="adding-post__tab-content">
              <section class="adding-post__photo tabs__content tabs__content--active" data-id="0">
                <h2 class="visually-hidden">Форма добавления фото</h2>
                <form class="adding-post__form form" action="/posts/store/image" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-heading">Заголовок <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-heading" type="text" name="title" placeholder="Введите заголовок">
                        </div>
                        @error('title')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-url">Ссылка из интернета</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-url" type="text" name="image_link" placeholder="Введите ссылку">
                        </div>
                        @error('image_link')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-tags">Теги</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-tags" type="text" name="hash_tags" placeholder="Введите теги">
                        </div>
                        @error('hash_tags')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                    </div>
                  </div>
                  <div class="adding-post__input-file-container form__input-container form__input-container--file">
                    <div class="adding-post__input-file-wrapper form__input-file-wrapper">
                      <div class="adding-post__file-zone adding-post__ form__file-zone dropzone">
                        <input class="adding-post__input-file form__input-file" id="userpic-file" type="file" name="image_file" title=" ">
                        <div class="form__file-zone-text">
                          <span>Перетащите фото сюда</span>
                        </div>
                      </div>
                      <button class="adding-post__input-file-button form__input-file-button form__input-file-button--photo button" type="button">
                        <span>Выбрать фото</span>
                        <svg class="adding-post__attach-icon form__attach-icon" width="10" height="20">
                          <use xlink:href="#icon-attach"></use>
                        </svg>
                      </button>
                    </div>
                    <div class="adding-post__file adding-post__file--photo form__file dropzone-previews">

                    </div>
                    @error('image_file')
                      <div style="color:red; margin-top:7px;">{{ $message }}</div>
                    @enderror 
                  </div>
                  <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                    <a class="adding-post__close" href="#">Закрыть</a>
                  </div>
                </form>
              </section>

              <section class="adding-post__video tabs__content" data-id="1">
                <h2 class="visually-hidden">Форма добавления видео</h2>
                <form class="adding-post__form form" action="/posts/store/video" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="video-heading">Заголовок <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="video-heading" type="text" name="title" placeholder="Введите заголовок">
                        </div>
                        @error('title')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="video-url">Ссылка youtube <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="video-url" type="text" name="video" placeholder="Введите ссылку">
                        </div>
                        @error('video')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="video-tags">Теги</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="video-tags" type="text" name="hash_tags" placeholder="Введите ссылку">
                        </div>
                        @error('hash_tags')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                    </div>
                  </div>

                  <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                    <a class="adding-post__close" href="#">Закрыть</a>
                  </div>
                </form>
              </section>

              <section class="adding-post__text tabs__content" data-id="2">
                <h2 class="visually-hidden">Форма добавления текста</h2>
                <form class="adding-post__form form" action="/posts/store/text" method="post">
                  @csrf
                  <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="text-heading">Заголовок <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="text-heading" type="text" name="title" placeholder="Введите заголовок">
                        </div>
                        @error('title')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__textarea-wrapper form__textarea-wrapper">
                        <label class="adding-post__label form__label" for="post-text">Текст поста <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <textarea class="adding-post__textarea form__textarea form__input" name="content" id="post-text" placeholder="Введите текст публикации"></textarea>
                        </div>
                        @error('content')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="post-tags">Теги</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="post-tags" type="text" name="hash_tags" placeholder="Введите теги">
                        </div>
                        @error('hash_tags')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                    </div>
                  </div>
                  <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                    <a class="adding-post__close" href="#">Закрыть</a>
                  </div>
                </form>
              </section>

              <section class="adding-post__quote tabs__content" data-id="3">
                <h2 class="visually-hidden">Форма добавления цитаты</h2>
                <form class="adding-post__form form" action="/posts/store/quote" method="post">
                  @csrf
                  <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="quote-heading">Заголовок <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="quote-heading" type="text" name="title" placeholder="Введите заголовок">
                        </div>
                        @error('title')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__textarea-wrapper">
                        <label class="adding-post__label form__label" for="cite-text">Текст цитаты <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <textarea class="adding-post__textarea adding-post__textarea--quote form__textarea form__input" name="content" id="cite-text" placeholder="Текст цитаты"></textarea>
                        </div>
                        @error('content')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__textarea-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="quote-author">Автор <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="quote-author" type="text" name="quote_author">
                        </div>
                        @error('quote_author')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="cite-tags">Теги</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="cite-tags" type="text" name="hash_tags" placeholder="Введите теги">
                        </div>
                        @error('hash_tags')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                    </div>
                  </div>
                  <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                    <a class="adding-post__close" href="#">Закрыть</a>
                  </div>
                </form>
              </section>

              <section class="adding-post__link tabs__content" data-id="4">
                <h2 class="visually-hidden">Форма добавления ссылки</h2>
                <form class="adding-post__form form" action="/posts/store/link" method="post">
                  @csrf
                  <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="link-heading">Заголовок <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="link-heading" type="text" name="title" placeholder="Введите заголовок">
                        </div>
                        @error('title')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__textarea-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="post-link">Ссылка <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="post-link" type="text" name="link">
                        </div>
                        @error('link')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="link-tags">Теги</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="link-tags" type="text" name="hash_tags" placeholder="Введите ссылку">
                        </div>
                        @error('hash_tags')
                          <div style="color:red; margin-top:7px;">{{ $message }}</div>
                        @enderror 
                      </div>
                    </div>
                  </div>
                  <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                  </div>
                </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </main>

    <div class="modal modal--adding">
      <div class="modal__wrapper">
        <button class="modal__close-button button" type="button">
          <svg class="modal__close-icon" width="18" height="18">
            <use xlink:href="#icon-close"></use>
          </svg>
          <span class="visually-hidden">Закрыть модальное окно</span></button>
        <div class="modal__content">
          <h1 class="modal__title">Пост добавлен</h1>
          <p class="modal__desc">
            Озеро Байкал – огромное древнее озеро в горах Сибири к северу от монгольской границы. Байкал считается самым глубоким озером в мире. Он окружен сефтью пешеходных маршрутов, называемых Большой байкальской тропой. Деревня Листвянка, расположенная на западном берегу озера, – популярная отправная точка для летних экскурсий.
          </p>
          <div class="modal__buttons">
            <a class="modal__button button button--main" href="#">Синяя кнопка</a>
            <a class="modal__button button button--gray" href="#">Серая кнопка</a>
          </div>
        </div>
      </div>
    </div>

    <script lang="javascript">
      let tabs = document.querySelectorAll(".tabs__content");
      let tabLinks = document.querySelectorAll(".adding-post__tabs-link")
      function clickByTabLink(tabLink)
      { 
        tabLinkDataId = tabLink.getAttribute("data-id");
        
        tabLinks.forEach(element => {
            if (element.getAttribute("data-id") == tabLinkDataId) {
              element.classList.add("filters__button--active")
            } else {
              element.classList.remove("filters__button--active")
            }
        });

        tabs.forEach(element => {
            if (element.getAttribute("data-id") == tabLinkDataId) {
              element.classList.add("tabs__content--active");
            } else {
              element.classList.remove("tabs__content--active")
            }
        });
      }
    </script>

@endsection
