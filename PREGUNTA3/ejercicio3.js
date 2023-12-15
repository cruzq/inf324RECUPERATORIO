var scene = new THREE.Scene();

                var scene = new THREE.Scene();

        // Crear la cámara
        var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 5;

        // Crear el renderizador
        var renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);
       // Crear suelo (plano verde)
        var groundGeometry = new THREE.PlaneGeometry(100, 100, 5, 5); // Tamaño del suelo y su resolución
        var groundMaterial = new THREE.MeshBasicMaterial({ color: 0x00FF00, side: THREE.DoubleSide }); // Color verde para el suelo
        var ground = new THREE.Mesh(groundGeometry, groundMaterial);
        ground.rotation.x = -Math.PI / 2; // Rotar el suelo para que esté horizontal
        ground.position.y = -3; // Mover el suelo hacia abajo
        scene.add(ground);

        // Crear materiales con diferentes colores para el muñeco de nieve, el sombrero y las manos
        var materialSnow = new THREE.MeshBasicMaterial({ color: 0xFFFFFF }); // Color blanco
        var materialHat = new THREE.MeshBasicMaterial({ color:0xFF0000 }); // Color negro
        var materialMouth = new THREE.MeshBasicMaterial({ color: 0xFF0000 }); // Color rojo para la boca
        var materialNose = new THREE.MeshBasicMaterial({ color: 0xFF6600 }); // Color naranja para la nariz
        var materialHands = new THREE.MeshBasicMaterial({ color: 0x8B4513 }); // Color café para las manos

        // Crear geometrías para las partes del muñeco de nieve (cuerpo, cabeza, ojos, nariz, boca, sombrero y manos)
        var geometryBody = new THREE.SphereGeometry(1.2, 32, 32); // Cuerpo
        var geometryHead = new THREE.SphereGeometry(0.8, 32, 40); // Cabeza
        var geometryEye = new THREE.SphereGeometry(0.1, 16, 16); // Ojos
        var geometryNose = new THREE.ConeGeometry(0.2, 0.8, 8); // Nariz
        var geometryHatBase = new THREE.CylinderGeometry(0.8, 0.8, 0.2, 32); // Base del sombrero
        var geometryHatTop = new THREE.CylinderGeometry(0.5, 0.5, 0.6, 32); // Parte superior del sombrero
        var geometryMouth = new THREE.SphereGeometry(0.2, 16, 16, 0, Math.PI * 2, 0, Math.PI / 2); // Boca
        var geometryHand = new THREE.CylinderGeometry(0.05, 0.05, 1, 8); // Manos (cilindros delgados)

        

        // Crear las mallas para las partes del muñeco de nieve y establecer sus posiciones con los materiales correspondientes
        var snowmanBody = new THREE.Mesh(geometryBody, materialSnow);
        snowmanBody.position.set(0, -1.2, 0); // Posición del cuerpo

        var snowmanHead = new THREE.Mesh(geometryHead, materialSnow);
        snowmanHead.position.set(0, 0.4, 0); // Posición de la cabeza

        var snowmanEye1 = new THREE.Mesh(geometryEye, new THREE.MeshBasicMaterial({ color: 0x000000 })); // Ojo 1
        snowmanEye1.position.set(-0.3, 0.6, 0.8); // Posición del ojo 1

        var snowmanEye2 = snowmanEye1.clone(); // Ojo 2 (clone del ojo 1)
        snowmanEye2.position.x = 0.3; // Posición del ojo 2

        var snowmanNose = new THREE.Mesh(geometryNose, materialNose); // Nariz
        snowmanNose.rotation.x = Math.PI / 2; // Rotar la nariz para que apunte hacia adelante
        snowmanNose.position.set(0, 0.2, 0.8); // Posición de la nariz

        var hatBase = new THREE.Mesh(geometryHatBase, materialHat); // Base del sombrero
        hatBase.position.set(0, 1.7, 0); // Posición de la base del sombrero

        var hatTop = new THREE.Mesh(geometryHatTop, materialHat); // Parte superior del sombrero
        hatTop.position.set(0, 2, 0); // Posición de la parte superior del sombrero

        var mouth = new THREE.Mesh(geometryMouth, materialMouth); // Boca
        mouth.position.set(0, 0.1, 0.95); // Posición de la boca
        mouth.rotation.y = Math.PI / 4; // Rotar la boca

        var hand1 = new THREE.Mesh(geometryHand, materialHands); // Mano 1
        hand1.position.set(0.8, -0.6, 0); // Posición de la mano 1
        //hand1.rotation.z = Math.PI / 3; // Rotar la mano 1

        var hand2 = new THREE.Mesh(geometryHand, materialHands); // Mano 2
        hand2.position.set(-0.6, -0.6, 0); // Posición de la mano 2
        //hand2.rotation.z = -Math.PI / 3; // Rotar la mano 2

        // Crear materiales para la bufanda (rojo oscuro)
        var materialScarf = new THREE.MeshBasicMaterial({ color: 0x800000 });

        // Crear geometrías para la bufanda (rectángulos)
        var scarfGeometry1 = new THREE.BoxGeometry(0.4, 0.2, 1); // Extremos de la bufanda
        var scarfGeometry2 = new THREE.BoxGeometry(0.2, 0.2, 2); // Centro de la bufanda

        // Crear mallas para la bufanda
        var scarfEnd1 = new THREE.Mesh(scarfGeometry1, materialScarf);
        scarfEnd1.position.set(0.6, -0.3, 0); // Posición del extremo 1 de la bufanda

        var scarfEnd2 = new THREE.Mesh(scarfGeometry1, materialScarf);
        scarfEnd2.position.set(-0.6, -0.3, 0); // Posición del extremo 2 de la bufanda

        var scarfMiddle = new THREE.Mesh(scarfGeometry2, materialScarf);
        scarfMiddle.position.set(0, -0.3, 0); // Posición del centro de la bufanda

        // Ajustar posición del sombrero (hatBase y hatTop)
        hatBase.position.set(0, 1.2, 0); // Posición base del sombrero
        hatTop.position.set(0, 1.5, 0); // Posición superior del sombrero



         document.addEventListener('mousemove', onMouseMove, false);

        function onMouseMove(event) {
            var mouseX = (event.clientX / window.innerWidth) * 2 - 1;
            var mouseY = -(event.clientY / window.innerHeight) * 2 + 1;

            // Ajustar la posición de la cámara según el movimiento del ratón
            camera.position.x = mouseX * 10;
            camera.position.y = mouseY * 10;
            camera.lookAt(scene.position);

            renderer.render(scene, camera);
        }

        // Agregar las partes del muñeco de nieve, el suelo y la bufanda a la escena
        scene.add(snowmanBody);
        scene.add(snowmanHead);
        scene.add(snowmanEye1);
        scene.add(snowmanEye2);
        scene.add(snowmanNose);
        scene.add(hatBase);
        scene.add(hatTop);
        scene.add(mouth);
        scene.add(hand1);
        scene.add(hand2);
        scene.add(scarfEnd1);
        scene.add(scarfEnd2);
        scene.add(scarfMiddle);


        // Agregar las partes del muñeco de nieve, el sombrero y las manos a la escena
        scene.add(snowmanBody);
        scene.add(snowmanHead);
        scene.add(snowmanEye1);
        scene.add(snowmanEye2);
        scene.add(snowmanNose);
        scene.add(hatBase);
        scene.add(hatTop);
        scene.add(mouth);
        scene.add(hand1);
        scene.add(hand2)

        // Animación: Hacer que el muñeco de nieve gire suavemente
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
            snowmanBody.rotation.y += 0.01; // Rotación del cuerpo
            snowmanHead.rotation.y += 0.01;
            hatBase.rotation.y += 0.01;
            hatTop.rotation.y += 0.01;
            hand1.rotation.z += 0.01;
            hand2.rotation.z += 0.01;

            renderer.render(scene, camera);
        }
        animate();