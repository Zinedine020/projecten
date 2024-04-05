<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GeneratePlanetController extends Command
{
    protected $signature = 'generate:planet-controller';

    protected $description = 'Generate PlanetController with index and show methods';

    public function handle()
    {
        // Controller aanmaken
        $controllerPath = app_path('Http/Controllers/PlanetController.php');
        file_put_contents($controllerPath, $this->getControllerTemplate());

        $this->info('PlanetController is gegenereerd!');
    }

    private function getControllerTemplate()
    {
        return "<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends Controller
{
    private \$planets = [
        'Mercury', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 'Neptune'
    ];

    public function index()
    {
        return view('planets.index', ['planets' => \$this->planets]);
    }

    public function show(\$planet)
    {
        if (in_array(\$planet, \$this->planets)) {
            return view('planets.show', ['planet' => \$planet]);
        } else {
            abort(404);
        }
    }
}
";
    }
}
