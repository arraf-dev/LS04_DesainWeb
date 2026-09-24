$ErrorActionPreference = 'Stop'

$projectRoot = Split-Path -Parent $PSScriptRoot
$requiredFiles = @(
    'static/index.html',
    'static/style.css',
    'dynamic/index.php',
    'dynamic/products.php',
    'dynamic/style.css',
    'README.md'
)

foreach ($relativePath in $requiredFiles) {
    $path = Join-Path $projectRoot $relativePath
    if (-not (Test-Path -LiteralPath $path -PathType Leaf)) {
        throw "Missing required file: $relativePath"
    }
}

$staticHtml = Get-Content -Raw (Join-Path $projectRoot 'static/index.html')
$dynamicHtml = Get-Content -Raw (Join-Path $projectRoot 'dynamic/index.php')
$productsPhp = Get-Content -Raw (Join-Path $projectRoot 'dynamic/products.php')
$staticCss = Get-Content -Raw (Join-Path $projectRoot 'static/style.css')

foreach ($name in @('Tas Kanvas', 'Notebook Batik', 'Lampu Meja')) {
    if ($staticHtml -notmatch [regex]::Escape($name)) {
        throw "Static page does not contain product: $name"
    }
    if ($productsPhp -notmatch [regex]::Escape($name)) {
        throw "Dynamic data does not contain product: $name"
    }
}

foreach ($asset in @('hero-original.jpg', 'product-1-original.jpg', 'product-2-original.jpg', 'product-3-original.jpg')) {
    if ($staticHtml -notmatch [regex]::Escape($asset)) {
        throw "Static page does not reference original asset: $asset"
    }
}

foreach ($requiredToken in @('htmlspecialchars', 'number_format', '?sort=price', 'usort')) {
    if ($dynamicHtml -notmatch [regex]::Escape($requiredToken)) {
        throw "Dynamic page is missing required behavior: $requiredToken"
    }
}

if ($staticCss -notmatch '@media') {
    throw 'Responsive CSS media query is missing'
}

Write-Output 'PASS: project structure and required catalog behavior are present.'
