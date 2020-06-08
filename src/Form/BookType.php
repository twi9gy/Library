<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null,[
                'label'=> 'Название книги',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Введите название книги'
                ]
            ])
            ->add('author', null, [
                'label'=> 'Имя автора книги',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Введите имя автора'
                ]
            ])
            ->add('cover',FileType::class, [
                'mapped' => false,
                'label'=> 'Обложка',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '3M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Загруите изображение в формате .jpg или .png',
                    ])
                ],
                'attr' => [
                    'class' => 'form-control-file',
                ]
            ])
            ->add('file_book',FileType::class, [
                'mapped' => false,
                'label'=> 'Файл книги',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/msword',
                            'text/plain',
                        ],
                        'mimeTypesMessage' => 'Загруите файл в формате .pdf, .doc, .txt',
                    ])
                ],
                'attr' => [
                    'class' => 'form-control-file',
                ]
            ])
            ->add('date_reading', null, [
                'label'=> 'Дата прочтения',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
