<?php

namespace Resources\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ArticleType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('title', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Length(array('min' => 5))
                )
            ))
            ->add('description', 'textarea', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Length(array('max' => 140))
                )
            ));
        //$builder->add('title')->add('description');
    }

    public function getName() {
        return 'blog_article';
    }
}
