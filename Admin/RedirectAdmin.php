<?php

namespace Wearejust\RedirectBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RedirectAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('active')
            ->add('fromUrl')
            ->add('toUrl')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('active')
            ->add('fromUrl')
            ->add('toUrl')
        ;
    }

    /**
     * Disable all export formats by default, off course you can override this
     * action when needed.
     *
     * https://sonata-project.org/bundles/admin/master/doc/reference/action_export.html
     *
     * @return array
     */
    public function getExportFormats()
    {
        return [];
    }

    /**
     * Disable the filters on the list page by default, off course you can enable
     * it when needed.
     *
     * https://sonata-project.org/bundles/admin/master/doc/reference/action_list.html
     *
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $filterMapper
     *
     * @return \Sonata\AdminBundle\Datagrid\DatagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        return $filterMapper;
    }
}
