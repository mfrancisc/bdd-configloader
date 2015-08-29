<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given there is a configuration file
     */
    public function thereIsAConfigurationFile()
    {
        if (!file_exists('fixtures/config.php'))
            throw new Exception("File 'fixtures/config.php' not found");

        $config = include 'fixtures/config.php';

        if (!is_array($config))
            throw new Exception("File 'fixtures/config.php' should contain an array");
    }

    /**
     * @Given the option :option is configured to :value
     */
    public function theOptionIsConfiguredTo($option, $value)
    {
        $config = include 'fixtures/config.php';

        if (!is_array($config)) $config = [];

        $config[$option] = $value;

        $content = "<?php\n\nreturn " . var_export($config, true) . ";\n";

        file_put_contents('fixtures/config.php', $content);
    }

    /**
     * @When I load the configuration file
     */
    public function iLoadTheConfigurationFile()
    {
        $this->config = Config::load('fixtures/config.php'); // Taylor!
    }

    /**
     * @Then I should get :arg1 as :arg2 option
     */
    public function iShouldGetAsOption($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given the option :arg1 is not yet configured
     */
    public function theOptionIsNotYetConfigured($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get default value :arg1 as :arg2 option
     */
    public function iShouldGetDefaultValueAsOption($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When I set the :arg1 configuration option to :arg2
     */
    public function iSetTheConfigurationOptionTo($arg1, $arg2)
    {
        throw new PendingException();
    }
}
