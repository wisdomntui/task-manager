<div class="modal fade {{ $class ?? '' }}" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}-title"
  aria-modal="true">
  <div class="modal-dialog modal-dialog-centered {{ $dialogClasses ?? '' }}" role="document">
    <div class="modal-content shadow">
      <div class="modal-header {{ $headerClasses ?? '' }}">
        <h5 class="modal-title white">{{ $title ?? '' }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <div class="modal-body">
        {{ $body }}
      </div>
      <div class="modal-footer">
        {{ $footer }}
      </div>
    </div>
  </div>
</div>
