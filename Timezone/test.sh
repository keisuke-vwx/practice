INPUT_LIST=$1
ANSWER_FILE=$2

if [[ -z ${INPUT_LIST} ]]
then
  echo "missing 1 arg. (set file name)"
  exit 0
fi

if [[ -z ${ANSWER_FILE} ]]
then
  echo "missing 2 args. (set file name)"
  exit 0
fi


:> _output.log

for i in {1..5}
do
  awk -v line=${i} 'NR == line' ${INPUT_LIST} | php Timezone.php >> _output.log
done

DIFF=`diff _output.log ${ANSWER_FILE}`

if [[ ${DIFF} = "" ]]
then
  echo OK.
  cat _output.log
else
  echo NG.
  echo ${DIFF}
fi

rm -f _output.log
