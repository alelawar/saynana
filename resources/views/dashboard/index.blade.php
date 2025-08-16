<x-layouts.app title="Product Page">
    <h1>Admin Page</h1>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</x-layouts.app>