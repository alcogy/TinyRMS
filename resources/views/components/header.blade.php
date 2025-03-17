<header class="global-header">
    <h1><a href="/">Tullamore</a></h1>
    <div>
        <ul>
            <li>{{ $userName }}</li>
            <li>
                <form action="/signout" method="POST">
                    @csrf
                    <input type="submit" value="Sign Out" class="button gray" />
                </form>
            </li>
        </ul>
    </div>
</header>
