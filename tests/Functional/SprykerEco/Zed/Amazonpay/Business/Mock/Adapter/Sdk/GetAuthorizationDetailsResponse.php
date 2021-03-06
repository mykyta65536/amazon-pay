<?php

/**
 * Apache OSL-2
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Functional\SprykerEco\Zed\Amazonpay\Business\Mock\Adapter\Sdk;


use SprykerEco\Zed\Amazonpay\Business\Api\Adapter\AbstractAdapter;

class GetAuthorizationDetailsResponse extends AbstractResponse
{

    /**
     * @param array $requestParameters
     */
    public function __construct(array $requestParameters)
    {
        parent::__construct($requestParameters);

        $amazonAuthId = $requestParameters[AbstractAdapter::AMAZON_AUTHORIZATION_ID];

        $this->responseBodyXml =
            '<GetAuthorizationDetailsResponse xmlns="http://mws.amazonservices.com/schema/OffAmazonPayments/2013-01-01">
  <GetAuthorizationDetailsResult>
    <AuthorizationDetails>
      <AuthorizationAmount>
        <CurrencyCode>EUR</CurrencyCode>
        <Amount>105.89</Amount>
      </AuthorizationAmount>
      <CapturedAmount>
        <CurrencyCode>EUR</CurrencyCode>
        <Amount>0</Amount>
      </CapturedAmount>
      <ExpirationTimestamp>2017-06-15T11:46:48.192Z</ExpirationTimestamp>
      <IdList/>
      <SoftDecline>false</SoftDecline>
      <AuthorizationStatus>
        <LastUpdateTimestamp>2017-05-16T11:46:48.192Z</LastUpdateTimestamp>
        <State>' . $this->getStatus($amazonAuthId) . '</State>
      </AuthorizationStatus>
      <AuthorizationFee>
        <CurrencyCode>EUR</CurrencyCode>
        <Amount>0.00</Amount>
      </AuthorizationFee>
      <AuthorizationBillingAddress>
        <City>Neunkirchen</City>
        <CountryCode>DE</CountryCode>
        <PostalCode>66538</PostalCode>
        <Name>Liam Barker</Name>
        <AddressLine1/>
        <AddressLine2>Meininger Strasse 58</AddressLine2>
      </AuthorizationBillingAddress>
      <CaptureNow>false</CaptureNow>
      <SellerAuthorizationNote/>
      <CreationTimestamp>2017-05-16T11:46:48.192Z</CreationTimestamp>
      <AmazonAuthorizationId>' . $amazonAuthId . '</AmazonAuthorizationId>
      <AuthorizationReferenceId>S02-3833498-3043105591ae6a7e09dd</AuthorizationReferenceId>
    </AuthorizationDetails>
  </GetAuthorizationDetailsResult>
  <ResponseMetadata>
    <RequestId>1795bbea-51a5-442b-a80d-477c2105dea9</RequestId>
  </ResponseMetadata>
</GetAuthorizationDetailsResponse>';
    }

    /**
     * @return string
     */
    protected function getStatus($amazonAuthId)
    {
        switch ($amazonAuthId) {
            case 'S02-5989383-0864061-A000001':
                return 'Open';
            case 'S02-5989383-0864061-A000002':
                return 'Open';
            case 'S02-5989383-0864061-A000003':
                return 'Open';
        }
    }

}
