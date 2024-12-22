<?php

namespace App\Services;

use App\Definitions\SourceDefinition;
use App\Enums\NewsProvidersEnum;
use App\Models\Source;
use App\Repositories\SourceRepository;
use App\Services\Base\BaseService;

/**
 * @property SourceRepository $repository
 */
class SourceService extends BaseService
{

    /**
     * @param SourceRepository $repository
     */
    public function __construct(SourceRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param string $name
     * @param string $description
     * @param string $url
     * @param string $remoteID
     * @param NewsProvidersEnum $provider
     * @return Source
     */
    public function addSource(
        string $name,
        string $description,
        string $url,
        string $remoteID,
        NewsProvidersEnum $provider
    ) : Source {
        /** @var Source $source */
        $source = $this->repository->create([
            SourceDefinition::NAME => $name,
            SourceDefinition::DESCRIPTION => $description,
            SourceDefinition::URL => $url,
            SourceDefinition::REMOTE_ID => $remoteID,
            SourceDefinition::PROVIDER => $provider
        ]);

        return $source;
    }

    /**
     * @return string
     */
    public function getNewsAPISources() : string {
        $sources = $this->repository
                        ->where(SourceDefinition::PROVIDER,NewsProvidersEnum::NEWS_API)
                        ->get();

        return $sources->pluck(SourceDefinition::REMOTE_ID)->join(',');

    }

    /**
     * @param NewsProvidersEnum $newsProvider
     * @param string|null $remoteID
     * @return Source|null
     */
    public function getSourceByRemoteID(NewsProvidersEnum $newsProvider, ?string $remoteID) : ?Source
    {
        /** @var ?Source $source */
        $source = $this->repository
            ->where(SourceDefinition::REMOTE_ID, $remoteID)
            ->where(SourceDefinition::PROVIDER, $newsProvider)
            ->first();

        return $source;
    }
}
