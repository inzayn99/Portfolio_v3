/

// Part 1 javascript functionality ends here
$(document).ready(function () {
  if (
    !$('#myCanvas').tagcanvas(
      {
        textColour: '#4FB1BE',
        outlineColour: 'transparent',
        reverse: true,
        depth: 0.8,
        maxSpeed: 0.05,
        weight: true,
      },
      'tags',
    )
  ) {
    // something went wrong hide the canvas container,
    $('#myCanvasContainer')
  }
})
