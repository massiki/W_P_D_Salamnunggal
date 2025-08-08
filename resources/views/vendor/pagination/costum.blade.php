@if ($paginator->hasPages())
  <div class="row">
    <div class="col-md-12 pagi-area text-center">
      <nav aria-label="navigation">
        <ul class="pagination">
          {{-- previous page link --}}
          @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
              <a class="page-link" aria-hidden="true"><i class="fas fa-angle-double-left"></i></a>
            </li>
          @else
            <li class="page-item">
              <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')">
                <i class="fas fa-angle-double-left"></i>
              </a>
            </li>
          @endif

          {{-- pagination Elements --}}
          @foreach ($elements as $element)
            {{-- three Dots Separator --}}
            @if (is_string($element))
              <li class="page-item disabled" aria-disabled="true"><a class="page-link"
                  href="#">{{ $element }}</a></li>
            @endif

            {{-- Array of Links --}}
            @if (is_array($element))
              @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                  <li class="page-item active" aria-label="page"><a class="page-link">{{ $page }}</a></li>
                @else
                  <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
              @endforeach
            @endif
          @endforeach

          {{-- Next Page Links --}}
          @if ($paginator->hasMorePages())
            <li class="page-item">
              <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')"><i class="fas fa-angle-double-right"></i></a>
            </li>
          @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
              <a class="page-link" aria-hidden="true" href="#"><i class="fas fa-angle-double-right"></i></a>
            </li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
@endif
