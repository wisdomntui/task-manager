<div class="modal fade {{ $class ?? '' }}" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}-title"
  aria-modal="true">
  <div class="modal-dialog modal-dialog-centered {{ $dialogClasses ?? '' }}" role="document">
    <div class="modal-content shadow">
      <div class="modal-header {{ $headerClasses ?? '' }}">
        <h5 class="modal-title white">{{ $title ?? '' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        {{ $content }}
    </div>
  </div>
</div>
