// ==================================== Select 2 =================================
$(document).ready(function () {
  $("#seaport").select2();
  $("#seaport3").select2();
  $("#seaport4").select2();
  $("#seaport5").select2();
});
// ============================= Tab Price ======================================

//tab tinh gia
var buttons = document.getElementsByClassName("tablinks");
var contents = document.getElementsByClassName("tabcontent");
function showContent(id) {
  for (var i = 0; i < contents.length; i++) {
    contents[i].style.display = "none";
  }
  var content = document.getElementById(id);
  content.style.display = "block";
}
for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", function () {
    var id = this.textContent;
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("active");
    }
    this.className += " active";
    showContent(id);
  });
}
showContent("LCL");

// ============================= FCL =============================================
// quality container
(function () {
  window.inputNumber = function (el) {
    var min = el.attr("min") || false;
    var max = el.attr("max") || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function () {
      init($(this));
    });

    function init(el) {
      els.dec.on("click", decrement);
      els.inc.on("click", increment);

      function decrement() {
        var value = el[0].value;
        value--;
        if (!min || value >= min) {
          el[0].value = value;
        }
      }

      function increment() {
        var value = el[0].value;
        value++;
        if (!max || value <= max) {
          el[0].value = value++;
        }
      }
    }
  };
})();

inputNumber($(".input-number"));
inputNumber($(".input-number2"));
inputNumber($(".input-number3"));

// =============================   Video popup ==================================
$("#play-video").on("click", function (e) {
  e.preventDefault();
  $("#video-overlay").addClass("open");
  $("#video-overlay").append(
    '<iframe width="560" height="315" src="https://www.youtube.com/embed/rYsu2o43jVo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
  );
});

$(".video-overlay, .video-overlay-close").on("click", function (e) {
  e.preventDefault();
  close_video();
});

$(document).keyup(function (e) {
  if (e.keyCode === 27) {
    close_video();
  }
});

function close_video() {
  $(".video-overlay.open").removeClass("open").find("iframe").remove();
}

// =============================   Grid card slider promotion   =====================================

// ============================= 3D modal ===================================================
// 3D model box

// Load 3D Scene
var scene = new THREE.Scene();

// Load Camera Perspektive
const fov = 35;
const aspect = window.innerWidth / window.innerHeight;
const near = 0.1;
const far = 500;
camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
scene.add(camera);

camera.position.set(0, 0, 250);

// Load a Renderer
renderer = new THREE.WebGLRenderer({ alpha: false });
renderer.setClearColor(0xffffff);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Load the Orbitcontroller

// Load Light
ambientLight = new THREE.AmbientLight(0x404040, 8);
scene.add(ambientLight);

directionalLight = new THREE.DirectionalLight(0xffffff, 1.5);
directionalLight.position.set(10, 10, 100).normalize();
scene.add(directionalLight);

// glTf 2.0 Loader
new THREE.GLTFLoader().load(
  "/wp-content/themes/TPG theme/3dmodel/cargo_ship/ship.gltf",
  function (gltf) {
    var object = gltf.scene;
    gltf.scene.scale.set(120, 120, 120);
    gltf.scene.position.x = 0; //Position (x = right+ left-)
    gltf.scene.position.y = 0; //Position (y = up+, down-)
    gltf.scene.position.z = 0; //Position (z = front +, back-)

    ship = gltf.scene.children[0];
    scene.add(gltf.scene);
    animate();

    new THREE.GLTFLoader().load(
      "/wp-content/themes/TPG theme/3dmodel/solar/earth.gltf",
      function (gltf) {
        gltf.scene.scale.set(30, 30, 30);
        gltf.scene.position.x = 0; //Position (x = right+ left-)
        gltf.scene.position.y = 0; //Position (y = up+, down-)
        gltf.scene.position.z = 0; //Position (z = front +, back-)

        solar = gltf.scene.children[0];
        scene.add(gltf.scene);

        animate2();
        startRenderLoop();
      }
    );
  }
);

function animate() {
  ship.rotation.x += 0.002;
  ship.rotation.y += 0.002;
  ship.rotation.z += 0.03;
  renderer.render(scene, camera);
  requestAnimationFrame(function () {
    animate();
  });
}

function animate2() {
  solar.rotation.z += 0.03;
  renderer.render(scene, camera);
  requestAnimationFrame(function () {
    animate2();
  });
}

function render() {
  renderer.render(scene, camera);
}

render();
animate();
animate2();
