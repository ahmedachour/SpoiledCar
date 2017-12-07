<?php

namespace SpoiledCarFrontOfficeBundle\DataGrid;

use Doctrine\ORM\EntityManager;

use Symfony\Component\Routing\RouterInterface;

use Symfony\Component\Translation\TranslatorInterface;

use Thrace\DataGridBundle\DataGrid\DataGridFactoryInterface;

/**
 * Description of InlineEdit
 *
 * @author ahmed
 */
class InlineEdit {
const IDENTIFIER = 'voiture_management';
    
    protected $factory;
    
    protected $translator;
    
    protected $router;
    
    protected $em;


    public function __construct (DataGridFactoryInterface $factory, TranslatorInterface $translator, RouterInterface $router, 
             EntityManager $em)
    {
        $this->factory = $factory;
        $this->translator = $translator;
        $this->router = $router;
        $this->em = $em;
    }

    public function build ()
    {
        
        $dataGrid = $this->factory->createDataGrid(self::IDENTIFIER);
        $dataGrid
            ->setCaption($this->translator->trans('caption'))
            ->setColNames(array(
                $this->translator->trans('column.kilometrage'),  
            ))
            ->setColModel(array(
                array(
                    'name' => 'kilometrage', 'index' => 'p.kilometrage', 'width' => 200,
                    'align' => 'left', 'sortable' => true, 'search' => true, 
                    'formatter' => 'currency', 'editable' => true, 'editrules' => array('required' => true)
                ),
            ))
            ->setQueryBuilder($this->getQueryBuilder())
            ->enableEditButton(true)
        ;

        return $dataGrid;
    }


    protected function getQueryBuilder()
    {
        $qb = $this->em->getRepository('SpoiledCarFrontOfficeBundle:Voiture')->createQueryBuilder('p');
        $qb
            ->select('p.id, p.kilometrage, p')
        ;
        
        return $qb;
    }
}