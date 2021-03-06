<?php declare(strict_types = 1);
namespace noxkiwi\lightsystem\Frontend\Box;

use noxkiwi\core\Helper\FrontendHelper;
use noxkiwi\core\Path;
use noxkiwi\lightsystem\Frontend\Box;
use noxkiwi\lightsystem\Model\OpcServerModel;

/**
 * I am the blank control class.
 *
 * @package      noxkiwi\lightsystem\Frontend
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2019 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class ServerBox extends Box
{
    /**
     * @param array $data
     */
    public function render(array $data): void
    {
        $file    = Path::FRONTEND_DIR . '/box/server.php';
        $path    = Path::getInheritedPath($file);
        $content = FrontendHelper::parseFile($path, $data);
        $this->setContent($content);
    }

    /**
     * @param array|null $options
     *
     * @throws \ReflectionException
     * @throws \noxkiwi\dataabstraction\Exception\EntryInconsistentException
     * @throws \noxkiwi\dataabstraction\Exception\EntryMissingException
     * @throws \noxkiwi\dataabstraction\Exception\ModelException
     */
    protected function setOptions(?array $options): void
    {
        parent::setOptions($options);
        if (! empty($options['serverId'])) {
            $this->opcServer = OpcServerModel::getInstance()->loadEntry($options['serverId']);
        }
    }
}
