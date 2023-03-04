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

    function getVals(){
  // Get slider values
  let parent = this.parentNode;
  let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat( slides[0].value );
    let slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  let displayElement = parent.getElementsByClassName("rangeValues")[0];
//innerHTML property allows Javascript code to manipulate a website being displayed
      displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
}

window.onload = function(){
  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
      for( let x = 0; x < sliderSections.length; x++ ){
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
     //oninput attribute fires when the value of an <input> element is changed
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}

</script>