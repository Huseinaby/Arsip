<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
    <style>
        #pdf-viewer {
            width: 100%;
            height: 100vh;
            overflow: auto;
        }
    </style>
</head>
<body>
    <div id="pdf-viewer"></div>
    <script>
        const url = '{{ Storage::url('imbs/' . $fileName) }}';

        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

        pdfjsLib.getDocument(url).promise.then(function(pdf) {
            // Loop through each page and render it
            const viewer = document.getElementById('pdf-viewer');
            for (let i = 1; i <= pdf.numPages; i++) {
                pdf.getPage(i).then(function(page) {
                    const viewport = page.getViewport({ scale: 1.5 });
                    const canvas = document.createElement('canvas');
                    viewer.appendChild(canvas);
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const context = canvas.getContext('2d');
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport,
                    };
                    page.render(renderContext);
                });
            }
        });
    </script>
</body>
</html>
