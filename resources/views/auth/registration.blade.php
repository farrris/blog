@extends("layouts.base")

@section("title", "регистрация")

@section("content")
  <main class="page__main page__main--registration">
    <div class="container">
      <h1 class="page__title page__title--registration">Регистрация</h1>
    </div>
    <section class="registration container">
      <h2 class="visually-hidden">Форма регистрации</h2>
      <form class="registration__form form" action="/registration" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__text-inputs-wrapper">
          <div class="form__text-inputs">
            <div class="registration__input-wrapper form__input-wrapper">
              <label class="registration__label form__label" for="registration-email">Электронная почта <span class="form__input-required">*</span></label>
              <div class="form__input-section">
                <input class="registration__input form__input" id="registration-email" type="email" name="email" placeholder="Укажите эл.почту">
                  @error('email')
                    <div style="color:red; margin-top:7px;">{{ $message }}</div>
                  @enderror 
              </div>
            </div>
            <div class="registration__input-wrapper form__input-wrapper">
              <label class="registration__label form__label" for="registration-login">Логин <span class="form__input-required">*</span></label>
              <div class="form__input-section">
                <input class="registration__input form__input" id="registration-login" type="text" name="login" placeholder="Укажите логин">
                @error('login')
                  <div style="color:red; margin-top:7px;">{{ $message }}</div>
                @enderror 
              </div>
            </div>
            <div class="registration__input-wrapper form__input-wrapper">
              <label class="registration__label form__label" for="registration-password">Пароль<span class="form__input-required">*</span></label>
              <div class="form__input-section">
                <input class="registration__input form__input" id="registration-password" type="password" name="password" placeholder="Придумайте пароль">
                @error('password')
                  <div style="color:red; margin-top:7px;">{{ $message }}</div>
                @enderror 
              </div>
            </div>
            <div class="registration__input-wrapper form__input-wrapper">
              <label class="registration__label form__label" for="registration-password-repeat">Повтор пароля<span class="form__input-required">*</span></label>
              <div class="form__input-section">
                <input class="registration__input form__input" id="registration-password-repeat" type="password" name="password_confirmation" placeholder="Повторите пароль">
                @error('password_confirmation')
                  <div style="color:red; margin-top:7px;">{{ $message }}</div>
                @enderror 
              </div>
            </div>
          </div>
        </div>
        <div class="registration__input-file-container">
          <input type="file" name="avatar">
          @error('avatar')
            <div style="color:red; margin-top:7px;">{{ $message }}</div>
          @enderror 
        </div>
        <button class="registration__submit button button--main" type="submit">Отправить</button>
      </form>
    </section>

  </main>
@endsection
