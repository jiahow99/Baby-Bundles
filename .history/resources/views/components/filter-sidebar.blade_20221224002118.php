<div class="mt-3">
    <h5>Price</h5>
    <div class="d-flex align-items-center justify-content-between ">
        <button class="btn btn-outline-primary px-4 py-2">button</button>
        <button class="btn btn-outline-primary px-4 py-2">button</button>
        <button class="btn btn-outline-primary px-4 py-2">button</button>
    </div>
    <div class="price-input">
        <div class="field">
          <span>Min</span>
          <input type="number" class="input-min" value="2500">
        </div>
        <div class="separator">-</div>
        <div class="field">
          <span>Max</span>
          <input type="number" class="input-max" value="7500">
        </div>
      </div>
      <div class="slider">
        <div class="progress"></div>
      </div>
      <div class="range-input">
        <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
      </div>
    </div>
</div>

<script>
    $('#multi3').mdbRange({
        width: '100%',
        single: {
            active: true,
            multi: {
            active: true,
            rangeLength: 2
            },
        }
    });
</script>