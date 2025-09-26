<!DOCTYPE html>
<html lang="ru" class="h-full">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'To do list' }}</title>
  <!-- Быстрый вариант для прототипа -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-slate-100">
  <header class="max-w-5xl mx-auto px-4 pt-6 flex items-center justify-between">
    <a href="/" class="font-semibold tracking-wide text-slate-100/90 hover:text-white">TodoApp</a>
    <nav class="text-sm">
      @auth
        <span class="mr-4 opacity-80">Привет, {{ Auth::user()->name }}</span>
        <a href="{{ route('logout') }}">
            <button class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600">Выйти</button>
        </a>
        
      @endauth
      @guest
        <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600">Войти</a>
        <a href="{{ route('reg') }}" class="ml-2 px-3 py-1.5 rounded-lg border border-slate-600 hover:bg-slate-700">Регистрация</a>
      @endguest
    </nav>
  </header>

  <main class="px-4 py-10">
    <div class="max-w-md mx-auto">
      @if (session('status'))
        <div class="mb-4 rounded-xl bg-emerald-600/20 border border-emerald-400/40 px-4 py-3 text-sm">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="mb-4 rounded-xl bg-rose-600/20 border border-rose-400/40 px-4 py-3 text-sm">
          <div class="font-medium mb-1">Проверьте поля:</div>
          <ul class="list-disc list-inside space-y-0.5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    {{ $slot }}
  </main>

  <footer class="max-w-5xl mx-auto px-4 pb-8 text-center text-xs text-slate-400/70">
    © {{ date('Y') }} TodoApp
  </footer>
</body>
</html>
