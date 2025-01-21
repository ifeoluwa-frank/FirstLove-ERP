<html>
    <head>
        <title>
            Bacenta list
        </title>
    </head>
    <body>
        @forelse ($bacentas as $bacenta)
            {{ $bacenta->bacenta_name }}
        @empty 
            <div>No Data Found</div>
        @endforelse
    </body>
</html>