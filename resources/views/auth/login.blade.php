<x-layouts.app :title="'Вход'">
  <div class="max-w-md mx-auto">
    <div class="rounded-2xl bg-slate-800/60 backdrop-blur border border-white/10 shadow-xl p-6">
      <h1 class="text-xl font-semibold mb-5">Вход</h1>

      <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label class="block text-sm mb-1">Email</label>
          <input type="email" name="email" value="{{ old('email') }}"
                 class="w-full rounded-xl bg-slate-900/60 border border-white/10 px-3 py-2 outline-none focus:border-indigo-400"
                 placeholder="you@example.com" required autofocus>
        </div>

        <div>
          <label class="block text-sm mb-1">Пароль</label>
          <input type="password" name="password"
                 class="w-full rounded-xl bg-slate-900/60 border border-white/10 px-3 py-2 outline-none focus:border-indigo-400"
                 placeholder="••••••••" required>
        </div>

        <div class="flex items-center justify-between">
          <label class="text-sm inline-flex items-center gap-2">
            <input type="checkbox" name="remember" class="rounded bg-slate-900 border-white/20">
            Запомнить меня
          </label>
          <a href="{{ route('reg') }}" class="text-sm text-indigo-300 hover:text-indigo-200">Создать аккаунт</a>
        </div>

        <button type="submit"
                class="w-full mt-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 px-4 py-2 font-medium">
          Войти
        </button>
      </form>
    </div>
  </div>
</x-layouts.app>
