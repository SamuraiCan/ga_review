@if ($paginator->hasPages())
  <nav role="navigation" aria-label="Pagination Navigation">
    <ul class="pagination justify-content-center">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
          <span class="page-link">前へ</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
            前へ
          </a>
        </li>
      @endif

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">次へ</a>
        </li>
      @else
        <li class="page-item disabled" aria-disabled="true">
          <span class="page-link">次へ</span>
        </li>
      @endif
    </ul>
  </nav>
@endif
