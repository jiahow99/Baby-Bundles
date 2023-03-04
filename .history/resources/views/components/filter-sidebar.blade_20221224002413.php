<div class="mt-3">
    <h5>Price</h5>
    <div class="d-flex align-items-center justify-content-between ">
        <button class="btn btn-outline-primary px-4 py-2">button</button>
        <button class="btn btn-outline-primary px-4 py-2">button</button>
        <button class="btn btn-outline-primary px-4 py-2">button</button>
    </div>
    <div id="filter">
        <div class="slider">

            <p>Price Range</p>
          
            <div class="range-slider">
              <span class="rangeValues"></span>
              <input value="1000" min="1000" max="50000" step="500" type="range">
              <input value="50000" min="1000" max="50000" step="500" type="range">
            </div>
          
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