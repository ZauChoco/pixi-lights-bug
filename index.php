
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />
        <title>PixiJS Lights - Demo</title>
        <style>
            body {
                margin:0;
                padding:0;
                background:black;
            }
            canvas {
                display: block;
                position:absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    </head>
    <body>
        <script src="libraries/pixi.js"></script>
        <script src="libraries/pixi-layers.js"></script>
        <script src="libraries/pixi-lights.js"></script>
        <script>

const {Application, Sprite, Container, lights, display} = PIXI;
const {diffuseGroup, normalGroup, lightGroup} = lights;
const {Layer, Stage} = display;

// Create new application
const app = new Application({
    backgroundColor: 0x000000, // Black is required!
    width: 800,
    height: 600
});
document.body.appendChild(app.view);

// Use the pixi-layers Stage instead of default Container
app.stage = new Stage();

// Add the background diffuse color
const diffuse = Sprite.fromImage('images/BGTextureTest.jpg');
diffuse.parentGroup = diffuseGroup;

// Add the background normal map
const normals = Sprite.fromImage('images/BGTextureNORM.jpg');
normals.parentGroup = normalGroup;

// Create the point light
const light = new PIXI.lights.PointLight(0xffffff, 1);
light.x = app.screen.width / 2;
light.y = app.screen.height / 2;

// Create a background container 
const background = new Container();
background.addChild(
    normals,
    diffuse,
    light
);

app.stage.addChild(
    // put all layers for deferred rendering of normals
    new Layer(diffuseGroup),
    new Layer(normalGroup),
    new Layer(lightGroup),
    // Add the lights and images
    background
);

        </script>
    </body>
</html>