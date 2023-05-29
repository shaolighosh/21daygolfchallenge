(function() {

  /*Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('../public/site/faceApi/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('../public/site/faceApi/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('../public/site/faceApi/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('../public/site/faceApi/models')
  ]).then(start);*/


Webcam.set({
        width: 500,
        height: 400,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
    Webcam.attach('#webcam');




    var canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        video = document.getElementById('webcam');
    var checkStatus = 0; 
    navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    
   navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    
    navigator.getMedia({
        video:true,
        audio:false
    }, function(stream){
        video.srcObject = stream;
        video.play();
    }, function(error){
        //error.code
    }
    );

    //async function start() {

      video.addEventListener('play',function()
                            {
          draw(this, context,640,480);
      },false);

  //}
    

    $('#captaureImage').click(function(){


      $("#videoContainer").hide();
      $("#captaureSrc").attr("src", canvas.toDataURL("image/png"));
      $("#captaureSrc").show();
      $(this).hide();
      $('#captaureSubmit').show();


       Webcam.snap( function(data_uri) {
        // display results in page

        $('#image_data_captaure').val(data_uri);


       /* document.getElementById('results').innerHTML = 
        '<img src="'+data_uri+'"/>';*/


        } );


      
      
      
      console.log(canvas.toDataURL());


      

    });
    


    async function draw(video,context, width, height)
    {
        context.drawImage(video,0,0,width,height);
        const model = await blazeface.load();
        const returnTensors = false;
        const predictions = await model.estimateFaces(video, returnTensors);
          if (predictions.length > 0)
          {
          // console.log(predictions);
           for (let i = 0; i < predictions.length; i++) {
           const start = predictions[i].topLeft;
           const end = predictions[i].bottomRight;
           var probability = predictions[i].probability;
           const size = [end[0] - start[0], end[1] - start[1]];
           // Render a rectangle over each detected face.
           context.beginPath();
           context.strokeStyle="green";
           context.lineWidth = "4";
           context.rect(start[0], start[1],size[0], size[1]);
           context.stroke();
           var prob = (probability[0]*100).toPrecision(5).toString();
           var text = prob+" total %";
           context.fillStyle = "red";
           context.font = "13pt sans-serif";
           context.fillText(text,start[0]+5,start[1]+20);




            //const detectionsCanvas = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()


          // if(prob > 95 && checkStatus == 0){

             
             




               //checkStatus = 1;

              let picture = canvas.toDataURL();

              //console.log("ssssssssssssssssssss"+detection);
              //console.log("ffffffffffffffffffff"+detections.descriptor);


         //  }

           
            }
        }
        setTimeout(draw,250,video,context,width,height);
    }


function loadLabeledImages() {
  const labels = ['Black Widow']
  return Promise.all(
    labels.map(async label => {
      const descriptions = []
      for (let i = 1; i <= 2; i++) {
        console.log(`http://localhost/training/public/uploads/userimages/5fa1559129483.png`);
        const img = await faceapi.fetchImage(`http://localhost/weblogin/recognation/labeled_images/Black%20Widow/1.jpg`)
        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
        descriptions.push(detections.descriptor)
      }

      return new faceapi.LabeledFaceDescriptors(label, descriptions)
    })
  )
}




})();
