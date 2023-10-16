@extends("layouts.base")

@section("title", "авторизация")

@section("content")
  <main class="page__main page__main--login">
    <div class="container">
      <h1 class="page__title page__title--login">Вход</h1>
    </div>
    <section class="login container">
      <h2 class="visually-hidden">Форма авторизации</h2>
      <form class="login__form form" action="/login" method="post">
        @csrf
        <div class="login__input-wrapper form__input-wrapper">
          <label class="login__label form__label" for="login-email">Электронная почта</label>
          <div class="form__input-section">
            <input class="login__input form__input" id="login-email" type="email" name="email" placeholder="Укажите эл.почту">
            @error('email')
              <div style="color:red; margin-top:7px;">{{ $message }}</div>
            @enderror 
            @error('wrong_data')
              <div style="color:red; margin-top:7px;">{{ $message }}</div>
            @enderror 
          </div>
        </div>
        <div class="login__input-wrapper form__input-wrapper">
          <label class="login__label form__label" for="login-password">Пароль</label>
          <div class="form__input-section">
            <input class="login__input form__input" id="login-password" type="password" name="password" placeholder="Введите пароль">
            @error('password')
              <div style="color:red; margin-top:7px;">{{ $message }}</div>
            @enderror 
          </div>
        </div>
        <button class="login__submit button button--main" type="submit">Отправить</button>
      </form>
    </section>
  </main>
@endsection