<x-layouts.app :title="'Задачи'">
  @auth
    <div class="max-w-2xl mx-auto space-y-6">
      <div class="rounded-2xl bg-slate-800/60 backdrop-blur border border-white/10 shadow-xl p-6">
        <h1 class="text-xl font-semibold mb-4">Ваши задачи</h1>

        @if (Auth::user()->todos->isEmpty())
          <p class="text-sm opacity-70">Пока пусто — создайте первую задачу ниже 👇</p>
        @else
          <ul class="divide-y divide-white/10">
            @foreach (Auth::user()->todos as $todo)
              <li class="py-3 flex items-center justify-between">
                <span>{{ $todo->text }}</span>

                <form action="{{ route('todo.delete') }}" method="GET">
                    <input type="hidden" name="id" value="{{ $todo->id }}">
                  <button class="px-3 py-1.5 rounded-lg bg-rose-600/80 hover:bg-rose-600 text-white text-sm">
                    Удалить
                  </button>
                </form>
              </li>
            @endforeach
          </ul>
        @endif
      </div>

      <div class="rounded-2xl bg-slate-800/60 backdrop-blur border border-white/10 shadow-xl p-6">
        <h2 class="text-lg font-medium mb-3">Создать задачу</h2>
        <form action="{{ route('todo.create') }}" method="POST" class="flex gap-2">
          @csrf
          <input type="text" name="text" value="{{ old('text') }}"
                 class="flex-1 rounded-xl bg-slate-900/60 border border-white/10 px-3 py-2 outline-none focus:border-indigo-400"
                 placeholder="Например: Позвонить клиенту" required>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <button type="submit"
                  class="rounded-xl bg-indigo-600 hover:bg-indigo-500 px-4 py-2 font-medium">
            Добавить
          </button>
        </form>
      </div>
    </div>
  @endauth

  @guest
    <div class="max-w-md mx-auto">
      <div class="rounded-2xl bg-slate-800/60 backdrop-blur border border-white/10 shadow-xl p-6 text-center">
        <h1 class="text-xl font-semibold mb-2">Залогинься, бро</h1>
        <p class="opacity-80 mb-4">Чтобы увидеть и создавать задачи</p>
        <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 inline-block">Страница входа</a>
      </div>
    </div>
  @endguest
</x-layouts.app>
