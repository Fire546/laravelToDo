<x-layouts.app :title="'Регистрация'">
  <div class="max-w-md mx-auto">
    <div class="rounded-2xl bg-slate-800/60 backdrop-blur border border-white/10 shadow-xl p-6">
      <h1 class="text-xl font-semibold mb-5">Регистрация</h1>

      <form action="{{ route('reg') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label class="block text-sm mb-1">Имя</label>
          <input type="text" name="name" value="{{ old('name') }}"
                 class="w-full rounded-xl bg-slate-900/60 border border-white/10 px-3 py-2 outline-none focus:border-indigo-400"
                 placeholder="Ваше имя" required>
        </div>

        <div>
          <label class="block text-sm mb-1">Email</label>
          <input type="email" name="email" value="{{ old('email') }}"
                 class="w-full rounded-xl bg-slate-900/60 border border-white/10 px-3 py-2 outline-none focus:border-indigo-400"
                 placeholder="you@example.com" required>
        </div>

        <div>
          <label class="block text-sm mb-1">Пароль</label>
          <input type="password" name="password"
                 class="w-full rounded-xl bg-slate-900/60 border border-white/10 px-3 py-2 outline-none focus:border-indigo-400"
                 placeholder="Минимум 8 символов" required>
        </div>

        <div>
          <label class="block text-sm mb-1">Подтверждение пароля</label>
          <input type="password" name="password_confirmation"
                 class="w-full rounded-xl bg-slate-900/60 border border-white/10 px-3 py-2 outline-none focus:border-indigo-400"
                 required>
        </div>

        <button type="submit"
                class="w-full mt-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 px-4 py-2 font-medium">
          Создать аккаунт
        </button>

        <p class="text-sm mt-3 text-center">
          Уже есть аккаунт?
          <a href="{{ route('login') }}" class="text-indigo-300 hover:text-indigo-200">Войти</a>
        </p>
      </form>
    </div>
  </div>
</x-layouts.app>
