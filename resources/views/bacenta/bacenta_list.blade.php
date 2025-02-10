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

        <form action="{{ route('bacenta.add') }}" method="POST">
            @csrf
            <div>
                <label>Bacenta Name:</label>
                <input type="text" name="bacenta_name" >
            </div>
            
            <div>
                <label>Bacenta Leader:</label>
                <input type="number" name="bacenta_leader_id" >
            </div>
                        
            <div>
                <label>Bacenta Location:</label>
                <input type="text" name="location" >
            </div>

            <div>
                <label>Status:</label>
                <select name="is_active">
                    <option disabled selected value="">-- Select an Option --</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
                    
            <div>
                <label>Username:</label>
                <input type="text" name="username" >
            </div>
            
            <div>
                <label>Password:</label>
                <input type="text" name="password" >
            </div>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>