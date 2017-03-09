<?php

namespace Dnunez24\Platformsh;

use Dnunez24\Platformsh\Exception\UnknownVariableException;

class Environment
{
    const PLATFORM_APP_DIR = 'PLATFORM_APP_DIR';
    const PLATFORM_APPLICATION = 'PLATFORM_APPLICATION';
    const PLATFORM_APPLICATION_NAME = 'PLATFORM_APPLICATION_NAME';
    const PLATFORM_BRANCH = 'PLATFORM_BRANCH';
    const PLATFORM_DOCUMENT_ROOT = 'PLATFORM_DOCUMENT_ROOT';
    const PLATFORM_ENVIRONMENT = 'PLATFORM_ENVIRONMENT';
    const PLATFORM_PROJECT = 'PLATFORM_PROJECT';
    const PLATFORM_RELATIONSHIPS = 'PLATFORM_RELATIONSHIPS';
    const PLATFORM_ROUTES = 'PLATFORM_ROUTES';
    const PLATFORM_TREE_ID = 'PLATFORM_TREE_ID';
    const PLATFORM_VARIABLES = 'PLATFORM_VARIABLES';
    const PLATFORM_PROJECT_ENTROPY = 'PLATFORM_PROJECT_ENTROPY';
    
    public function getAppDir()
    {
        return $this->getEnvVariable(self::PLATFORM_APP_DIR);
    }
    
    public function getAppPath(string $path)
    {
        return realpath($this->getAppDir() . $path);
    }
    
    public function getApplication()
    {
        return $this->getEnvVariableDecoded(self::PLATFORM_APPLICATION);
    }
    
    public function getApplicationName()
    {
        return $this->getEnvVariable(self::PLATFORM_APPLICATION_NAME);
    }
    
    public function getBranch()
    {
        return $this->getEnvVariable(self::PLATFORM_BRANCH);
    }
    
    public function getDocumentRoot()
    {
        return $this->getEnvVariable(self::PLATFORM_DOCUMENT_ROOT);
    }
    
    public function getEnvironment()
    {
        return $this->getEnvVariable(self::PLATFORM_ENVIRONMENT);
    }
    
    public function getEnvVariable(string $name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        
        $value = getenv($name);
        
        if (!$value) {
            throw new UnknownVariableException("Variable $name does not exist in this environment.");
        }
    
        return $this->$name;
    }
    
    public function getEnvVariableDecoded(string $name)
    {
        $value = $this->getEnvVariable($name);
        return $this->decodeVariable($value);
    }
    
    public function getProject()
    {
        return $this->getEnvVariable(self::PLATFORM_PROJECT);
    }
    
    public function getProjectEntropy()
    {
        return $this->getEnvVariable(self::PLATFORM_PROJECT_ENTROPY);
    }
    
    public function getRelationships()
    {
        return $this->getEnvVariableDecoded(self::PLATFORM_RELATIONSHIPS);
    }
    
    public function getRoutes()
    {
        return $this->getEnvVariableDecoded(self::PLATFORM_RELATIONSHIPS);
    }
    
    public function getTreeId()
    {
        return $this->getEnvVariable(self::PLATFORM_TREE_ID);
    }
    
    public function getVariables()
    {
        return $this->getEnvVariableDecoded(self::PLATFORM_VARIABLES);
    }
    
    protected function decodeVariable(string $value)
    {
        return json_decode(base64_decode($value), true);
    }
}
