<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Meta etiquetas SEO --}}
    <meta name="description" content="Blog dedicado a Noticias sobre criptomonedas">
    <meta name="keywords" content="Blog, Criptomonedas, Tecnologia, Noticias, Bitcoin, Ethereum">
    <meta name="robots" content="index, follow">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="" type="image/x-icon">
    <title>Crypto News RSS</title>
  </head>

  <body class="bg-[#0C1116] font-poppins">
    @include('partials.header')
    <div class=" flex items-center justify-center text-white m-4">
      <p class="p-2">Quantity of news:</p>

    </div>
    <div class="grid md:grid-cols-2 gap-4 mx-2 md:mx-14">
      @foreach ($feeds as $feed)
      <div class="m-4 flex flex-col">
        <div class="header flex items-center justify-center flex-row mb-2">
          <h1
            class="text-center text-white text-3xl	font-bold m-4 hover:text-[#99caff] transition-all duration-300 ease-in-out">
            <a href="{{ $feed['permalink'] }}" Target=" _blank">{{ $feed['title'] }}
          </h1>
          <div class="p-2 bg-gray-500 rounded">
            @if ($feed['title'] == 'Decrypt')
            <img class="w-10 h-10 object-contain"
              src="https://img.decrypt.co/insecure/rs:fit:128:0:0:0/plain/https://cdn.decrypt.co/wp-content/themes/decrypt-media/assets/images/brand/decrypt-word.png@webp"
              alt="{{ $feed['title'] }}">
            @else
            <img class="w-10 h-10 object-contain" src="{{ $feed['image'] }}" alt="{{ $feed['title'] }}">
            @endif</a>
          </div>
        </div>

        <div class="bg-[#404450] p-4 md:p-8 rounded flex-grow shadow shadow-[#4f5461]">
          @foreach ($feed['items'] as $item)
          <div class="item my-4 hover:bg-[#747b8a] rounded p-2 transition-all duration-500 ease-in-out">
            <h3 class="font-bold text-white text-1xl hover:text-[#7cb7f6] mb-2 transition-all duration-300 ease-in-out">
              <a href="{{ $item->get_permalink() }} " Target="_blank">{{ $item->get_title() }}</a>
            </h3>
            {{-- <p class="text-white mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($item->get_description()), 150,
              '...') }}</p> --}}

            <p class="text-white"><small>Published on {{ $item->get_date('j F Y | g:i a') }}</small></p>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>

    @include('partials.footer')
  </body>

</html>