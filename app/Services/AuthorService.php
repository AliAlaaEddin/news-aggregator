<?php

namespace App\Services;

use App\Definitions\AuthorDefinition;
use App\Enums\NewsProvidersEnum;
use App\Models\Author;
use App\Repositories\AuthorRepository;
use App\Services\Base\BaseService;
use Illuminate\Support\Str;

/**
 * @property AuthorRepository $repository
 */
class AuthorService extends BaseService
{

    /**
     * @param AuthorRepository $repository
     */
    public function __construct(AuthorRepository $repository)
    {
        parent::__construct($repository);
    }


    /**
     * @param string $name
     * @return Author|null
     */
    public function getAuthorByName(string $name) : ?Author {

        /** @var ?Author $author */
        $author = $this->repository
            ->where(AuthorDefinition::NAME, $name)
            ->first();

        return $author;
    }

    /**
     * @param NewsProvidersEnum $newsProviders
     * @param string $name
     * @param string|null $bio
     * @param string|null $image
     * @return Author
     */
    public function addAuthor(
        NewsProvidersEnum $newsProviders,
        string $name,
        ?string $remoteID = null,
        ?string $bio = null,
        ?string $image = null) : Author
    {
        if(!$remoteID) {
            $remoteID = Str::replace(' ', '_', $newsProviders->value.' '.$name);
        }

        /** @var Author $author */
        $author = $this->repository->create([
            AuthorDefinition::NAME => $name,
            AuthorDefinition::REMOTE_ID => $remoteID,
            AuthorDefinition::BIO => $bio,
            AuthorDefinition::IMAGE_URL => $image,
            AuthorDefinition::PROVIDER  => $newsProviders
        ]);

        return $author;
    }


    /**
     * @param NewsProvidersEnum $newsProviders
     * @param string $authorName
     * @return Author
     */
    public function getOrCreateAuthor(NewsProvidersEnum $newsProviders,string $authorName) : Author {

        $author = $this->getAuthorByName($authorName);

        if(!$author) {
            $author = $this->addAuthor(
                $newsProviders,
                $authorName
            );
        }

        return $author;
    }
}
