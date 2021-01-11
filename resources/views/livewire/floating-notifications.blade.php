<div class=" bg-opacity-50 bg-red-700 |
fixed inset-0 flex flex-col pointer-events-none items-center justify-end px-4 py-6 space-y-4 |
sm:items-end sm:p-6 sm:justify-start ">
{{--  <div class="h-24 w-24 bg-blue-600 pointer-events-auto" wire:click="sayHello">{{ $thing }}</div>--}}

<!-- This example requires Tailwind CSS v2.0+ -->

  @if($notifications)

  @foreach($notifications as $notification)

    @if($notification->linkText)
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg pointer-events-auto flex ring-1 ring-black ring-opacity-5 divide-x divide-gray-200">
      <div class="w-0 flex-1 flex items-center p-4">
        <div class="w-full">
          <p class="text-sm font-medium text-gray-900">
            {{ $notification->title }}
          </p>
          <p class="mt-1 text-sm text-gray-500">
            {{ $notification->details }}
          </p>
        </div>
      </div>
      <div class="flex">
        <div class="flex flex-col divide-y divide-gray-200">
          <div class="h-0 flex-1 flex">
            <button
              wire:click="activate({{ $notification->id }})"
              class="w-full border border-transparent rounded-none rounded-tr-lg px-4 py-3 flex items-center justify-center text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:z-10 focus:ring-2 focus:ring-indigo-500">
              {{ $notification->linkText }}
            </button>
          </div>
          <div class="h-0 flex-1 flex">
            <button
              wire:click="dismiss({{ $notification->id }})"
              class="w-full border border-transparent rounded-none rounded-br-lg px-4 py-3 flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
              Dismiss
            </button>
          </div>
        </div>
      </div>
    </div>
    @else
    <div
      class="max-w-md w-full bg-white shadow-lg rounded-lg pointer-events-auto flex ring-1 ring-black ring-opacity-5">
      <div class="w-0 flex-1 p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0 pt-0.5">
            <x-app.icon.circle-check/>
          </div>
          <div class="ml-3 w-0 flex-1">
            <p class="text-sm font-medium text-gray-900">
              {{ $notification->title }}
            </p>
            <p class="mt-1 text-sm text-gray-500">
              {{ $notification->details }}
            </p>
          </div>
        </div>
      </div>
      <div class="flex border-l border-gray-200">
        <button wire:click="dismiss({{ $notification->id }})"
          class="w-full border border-transparent rounded-none rounded-r-lg p-4 flex items-center justify-center
          text-sm font-medium text-indigo-600 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700">
          Dismiss
        </button>
      </div>
    </div>
    @endif

  @endforeach
@endif


  <div class="h-8 w-full text-right text-white font-extrabold">{{ $buster }}</div>
</div>


