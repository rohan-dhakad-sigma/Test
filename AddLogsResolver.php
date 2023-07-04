<?php
/**
 * @category  Sigma
 * @package   Sigma_CareersGraphQl
 * @author    SigmaInfo Team
 * @copyright 2021 Sigma (https://www.sigmainfo.net/)
 */
namespace Cloudways\RestApi\Model\Resolver;


use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\Event\ManagerInterface as EventManager;

/**
 * Resolver forAdd Service Model Request
 */
class AddCareerRequestOutput implements ResolverInterface
{
    /**
     * @var EventManager
     */
    private $_eventManager;

    /**
     * AddCareerRequestOutput constructor.
     *
     * @param Filesystem $fileSystem
     * @param File $fileDriver
     * @param EventManager $eventManager
     */
    public function __construct(
        Filesystem $fileSystem,
        File $fileDriver,
        EventManager $eventManager
    ) {
        $this->fileSystem = $fileSystem;
        $this->fileDriver = $fileDriver;
        $this->_eventManager = $eventManager;
    }

    /**
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return mixed
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $response = [
            'success' => true,
            'api_endpoint' => $args['input']['api_endpoint'],
            'request_body' => $args['input']['request_body'],
            'response_body'=> $args['input']['response_body'],
            'status_code' =>  $args['input']['status_code']
        ];
        $result = [];
        if($response) {
            $result['status_code'] = 200;
            $result['success_message'] = "Logs added successfully";
        }


        $this->_eventManager->dispatch('dusklog_event',
            [
                'record' => $response
            ]
        );
        return $result;
    }
}
