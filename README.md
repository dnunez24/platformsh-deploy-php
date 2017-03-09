# Platform.sh PHP Deploy

This is a foundational library to create build and deployment processes for PHP applications hosted on Platform.sh.

## Getting Started

Implement your concrete build strategy by extending the abstract class from this library:

```php
<?php

namespace MyVendor\MyApp\Strategy;

use Dnunez24\Platformsh\Strategy\AbstractBuildStrategy;

class BuildStrategy extends AbstractBuildStrategy
{
    public function build()
    {
        // add your build steps here
    }
}
```

You can also implement the strategy interfaces directly:

```php
<?php

namespace MyVendor\MyApp\Strategy;

use Dnunez24\Platformsh\Strategy\BuildStrategyInterface;

class BuildStrategy implements BuildStrategyInterface
{
    public function build()
    {
        // add your build steps here
    }

}
```

Create your build command

```php
<?php

namespace MyVendor\MyApp\Command;

use Dnunez24\Platformsh\Command\AbstractBuildCommand;

class MyBuildCommand extends AbstractBuildCommand
{
    protected function configure()
    {
        // Add Symfony Console configuration steps here
        // See: http://symfony.com/doc/current/console.html#configuring-the-command
    }
}
```

Then create the Symfony Console application in your project, someplace like `bin/myapp`:

```php
#!/usr/bin/env php

<?php

use Symfony\Component\Console\Application;
use MyVendor\MyApp\Strategy\BuildStrategy;
use MyVendor\MyApp\Strategy\DeployStrategy;
use MyVendor\MyApp\Command\BuildCommand;
use MyVendor\MyApp\Command\DeployCommand;

$buildStrategy = new BuildStrategy();
$buildCommand = new BuildCommand($buildStrategy);

$deployStrategy = new DeployStrategy();
$deployCommand = new DeployCommand($deployStrategy)

$application = new Application();
$application->add($buildCommand);
$application->add($deployCommand);
$application->run();
```

Finally, run your scripts to build and deploy the app:

```bash
composer exec bin/myapp build
composer exec bin/myapp deploy
```
