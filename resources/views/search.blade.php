

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form method="get" action="{{ route('search.result') }}" class="form-inline mr-auto">
              <input type="text" name="s" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control col-sm-8"  placeholder="Search..." aria-label="Search">
              <button class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
            </form>
            <br>
            @if(isset($searchResults))
                @if ($searchResults-> isEmpty())
                    <h2>Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h2>
                @else
                    <h2>There are {{ $searchResults->count() }} results for the term <b>"{{ $searchterm }}"</b></h2>
                    <hr />
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                    <h2>{{ $type }}</h2>

                    @foreach($modelSearchResults as $searchResult)
                        <ul>
                            <!-- Biến $url được cấu hình trong file model-->
                            <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                        </ul>
                    @endforeach
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>

