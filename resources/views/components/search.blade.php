<form class="mx-5 block space-y-2 md:mx-auto md:space-x-2" method="GET" action="{{ route('jobs.search') }}">
    <input class="w-full px-4 py-3 focus:outline-none md:w-72" name="keywords" type="text"
        value="{{ request('keywords') }}" placeholder="Keywords" />
    <input class="w-full px-4 py-3 focus:outline-none md:w-72" name="location" type="text"
        value="{{ request('location') }}" placeholder="Location" />
    <button class="w-full bg-blue-700 px-4 py-3 text-white hover:bg-blue-600 focus:outline-none md:w-auto">
        <i class="fa fa-search mr-1"></i> Search
    </button>
</form>
